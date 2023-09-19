<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index(){
        $this->authorize('isAdmin');
        $user = User::paginate(5);
        return view('kelolauser', compact('user'));
    }

    public function create(){
        return view('tambahuser');
    }

    public function store(Request $request){
        $request->validate([
            'name'      =>  'required|max:255',
            'alamat'    =>  'required|max:255',
            'tgllahir'  =>  'required|date',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:6'
        ]);
        $user = User::factory()->create([
            'name'      =>  $request->name,
            'alamat'    =>  $request->alamat,
            'tgllahir'  =>  $request->tgllahir,
            'email'     =>  $request->email,
            'password'  =>  bcrypt($request->password),
            'role'      =>  'user'
        ]);

        if($user){
            return redirect(route('kelola.user'))->with('success','Data berhasil ditambahkan');
        }
        return redirect(route('tambah.user'))->with('error', 'Data gagal ditambahkan');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'name'      =>  'required',
            'alamat'    =>  'required',
            'tgllahir'  =>  'required',
            'email'     =>  'required',
            'password'  =>  'required'
        ]);
        $edit = $user->update([
            'name'      =>  $request->name,
            'alamat'    =>  $request->alamat,
            'tgllahir'  =>  $request->tgllahir,
            'email'     =>  $request->email,
            'password'  =>  (Hash::check($request->password, Hash::make($request->password))) ? $request->password : Hash::make($request->password)
        ]);

        if($edit){
            return redirect(route('kelola.user'))->with('success', 'Data berhasil diupdate');
        }
        return redirect(route('edit.user'))->with('error', 'Data gagal diupdate');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('kelola.user'))->with('success','Data berhasil dihapus');
    }
}
