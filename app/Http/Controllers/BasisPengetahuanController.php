<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Http\Requests\StoreBasisPengetahuanRequest;
use App\Http\Requests\UpdateBasisPengetahuanRequest;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        $pengetahuan = BasisPengetahuan::join('penyakits', 'idpenyakit', '=', 'penyakits.id')->join('gejalas', 'idgejala', '=', 'gejalas.id')->select('basis_pengetahuans.id','penyakits.namapenyakit','gejalas.namagejala','mb','md')->orderBy('basis_pengetahuans.created_at')->paginate(5);
        return view('pengetahuan', compact('pengetahuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        return view('tambahpengetahuan', compact('penyakit','gejala'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBasisPengetahuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namapenyakit'  =>  'required',
            'namagejala'    =>  'required',
            'mb'            =>  'required',
            'md'            =>  'required'
        ]);
        $basisPengetahuan = new BasisPengetahuan();
        $results = $basisPengetahuan->where('idpenyakit', $request->namapenyakit)->where('idgejala', $request->namagejala)->first();
        // dd($results);
        if($results){
            $x = $results->update([
                'idpenyakit'  =>  $request->namapenyakit,
                'idgejala'    =>  $request->namagejala,
                'mb'            =>  $request->mb,
                'md'            =>  $request->md
            ]);
        }else{
            $x = $basisPengetahuan->factory()->create([
                'idpenyakit'  =>  $request->namapenyakit,
                'idgejala'    =>  $request->namagejala,
                'mb'            =>  $request->mb,
                'md'            =>  $request->md
            ]);
        }

        if($x){
            return redirect(route('pengetahuan.index'))->with('success', 'Data berhasil ditambahkan');
        }
        return back()->withErrors('Data gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BasisPengetahuan  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function show(BasisPengetahuan $basisPengetahuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BasisPengetahuan  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function edit(BasisPengetahuan $pengetahuan)
    {
        $pengetahuan = BasisPengetahuan::join('penyakits', 'idpenyakit', '=', 'penyakits.id')->join('gejalas', 'idgejala', '=', 'gejalas.id')->select('basis_pengetahuans.*','penyakits.namapenyakit','gejalas.namagejala','mb','md')->orderBy('basis_pengetahuans.created_at')->get();
        $penyakit = Penyakit::all();
        $gejala = Gejala::all();
        foreach ($pengetahuan as $p) {
            $peng = $p;
        }
        return view('editpengetahuan', compact('peng','penyakit','gejala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBasisPengetahuanRequest  $request
     * @param  \App\Models\BasisPengetahuan  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BasisPengetahuan $Pengetahuan)
    {
        $request->validate([
            'namapenyakit'  =>  'required',
            'namagejala'    =>  'required',
            'mb'            =>  'required',
            'md'            =>  'required'
        ]);
        $b = $Pengetahuan->update([
            'namagejala'  =>  $request->namagejala,
            'nama penyakit'=>  $request->namapenyakit,
            'mb'        =>  $request->mb,
            'md'        =>  $request->md
        ]);
        // dd($b);/
        return redirect(route('pengetahuan.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BasisPengetahuan  $basisPengetahuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(BasisPengetahuan $Pengetahuan)
    {
        $Pengetahuan->delete();
        return back()->with('success','Data berhasil dihapus');
    }
}
