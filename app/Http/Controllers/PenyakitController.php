<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        $penyakit = Penyakit::paginate(10);
        return view('penyakit', compact('penyakit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahpenyakit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenyakitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namapenyakit'    =>  'required',
            'detailpenyakit'  =>  'required',
            'solusi'        =>  'required'
        ]);
        $penyakit = Penyakit::factory()->create([
            'namapenyakit'      =>  $request->namapenyakit,
            'detailpenyakit'    =>  $request->detailpenyakit,
            'solusi'            =>  $request->solusi
        ]);

        if($penyakit){
            return redirect(route('penyakit.index'))->with('success','Data berhasil ditambahkan');
        }
        return back()->withErrors('Data gagal ditambakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        return view('editpenyakit', compact('penyakit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenyakitRequest  $request
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'namapenyakit'  =>  'required',
            'detailpenyakit'=>  'required',
            'solusi'        =>  'required'
        ]);

        $p = $penyakit->update([
            'namapenyakit'  =>  $request->namapenyakit,
            'detailpenyakit'=>  $request->detailpenyakit,
            'solusi'        =>  $request->solusi
        ]);

        if($p){
            return redirect(route('penyakit.index'))->with('success', 'Data berhasil diupdate');
        }
        return back()->withErrors('Data gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
