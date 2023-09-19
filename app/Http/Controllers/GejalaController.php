<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Http\Requests\StoreGejalaRequest;
use App\Http\Requests\UpdateGejalaRequest;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        $gejala = Gejala::paginate(10);
        return view('gejala',compact('gejala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahgejala');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGejalaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namagejala'    =>  'required|max:255'
        ]);
        $gejala = Gejala::factory()->create([
            'namagejala'    =>  $request->namagejala
        ]);

        if($gejala){
            return redirect(route('gejala.index'))->with('success', 'Data gejala berhasil ditamahkan');
        }
        return redirect(route('gejala.create'))->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function show(Gejala $gejala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function edit(Gejala $gejala)
    {
        // $gejala = $gejala->findOrFail($gejala->id);
        // dd($gejala);
        return view('editgejala', compact('gejala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGejalaRequest  $request
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gejala $gejala)
    {
        $request->validate([
            'namagejala'    =>  'required'
        ]);
        $g = $gejala->update([
            'namagejala'    =>  $request->namagejala
        ]);

        if($g){
            return redirect(route('gejala.index'))->with('success', 'Data berhasil diupdate');
        }

        return back()->withErrors('Data gagal di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gejala  $gejala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return back();
    }
}
