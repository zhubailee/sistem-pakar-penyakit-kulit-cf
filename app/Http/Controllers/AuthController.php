<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        // $this->authorize('auth');
        $penyakit = Penyakit::count();
        $gejala = Gejala::count();
        $basis = BasisPengetahuan::count();
        $user = User::where('role','user')->count();
        // dd($penyakit);
        return view('index', compact('penyakit','gejala','basis','user'));
    }
    public function login(){
        return view('auth.login');
    }

    public function loginProcess(Request $request){
        $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect(route('dashboard'))->with('signed in');
        }
        return redirect(route('login'))->withErrors('Email atau password tidak sesuai');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        $request->validate([
            'email'     =>  'required|email|unique:users',
            'name'      =>  'required|max:255',
            'alamat'    =>  'required|max:255',
            'tgllahir'  =>  'required',
            'password'  =>  'required|min:6'
        ]);

        $user = User::factory()->create([
            'name'  =>  $request->name,
            'alamat'=>  $request->alamat,
            'tgllahir'  =>  $request->tgllahir,
            'email'     =>  $request->email,
            'password'  =>  bcrypt($request->password),
            'role'      =>  'user'
        ]);

        if($user){
            return redirect(route('login'))->with(['success', 'Berhasil mendaftar']);
        }

        return redirect(route('register'))->withErrors('gagal mendaftar');
    }
}
