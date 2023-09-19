<?php namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\BasisPengetahuan;
use App\Models\Gejala;
use App\Models\Kondisi;
use App\Models\Penyakit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagnosaController extends Controller {
    public function diagnosa() {
        $this->authorize('auth');
        $gejala=Gejala::all();
        $kondisi=Kondisi::all();
        return view('diagnosa', compact('gejala', 'kondisi'));
    }

    public function diagnosaProcess(Request $request) {
        error_reporting(0);
        $arbbt = array('0','1','0.8','0.6', '0.4','-0.2','-0.4','-0.6','-0.8','-1');
        $argej = array();
        $arpenyakit = array();
        // $arpen = array();
        for ($i=0; $i < count($request->kondisi); $i++) { 
            $arkondisi = explode('_', $request->kondisi[$i]);
            if(strlen($request->kondisi[$i]>1)){
                $argej += array($arkondisi[0]=>$arkondisi[1]);
            }
        }
        $sqlkondisi = Kondisi::orderBy('id')->get();
        foreach ($sqlkondisi as $sqlkds) {
            $arkondisitext[$sqlkds->id] = $sqlkds->kondisi;
        }
        $sqlpkt = Penyakit::orderBy('id')->get();
        foreach ($sqlpkt as $pkt) {
            $arpkt[$pkt->id] = $pkt->namapenyakit;
        }

        foreach ($sqlpkt as $rpenyakit) {
            $cf = 0;
            $cflama = 0;
            $sqlgejala = BasisPengetahuan::where('idpenyakit',$rpenyakit->id)->get();
            foreach ($sqlgejala as $rgejala) {
                $arkondisi = explode('_',$request->input('kondisi')[0]);
                $gejala = $arkondisi[0];
                for ($i=0; $i < count($request->kondisi); $i++) { 
                    $arkondisi = explode('_',$request->input('kondisi')[$i]);
                    $gejala = $arkondisi[0];
                    if($rgejala->idgejala == $gejala){
                        $cf = ($rgejala->mb - $rgejala->md) * $arbbt[$arkondisi[1]];
                        if(($cf >= 0) && ($cf * $cflama >= 0)){
                            $cflama = $cflama+($cf * (1 - $cflama));
                        }
                        if ($cf * $cflama < 0) {
                            $cflama=($cflama + $cf) / (1 - Min(abs($cflama), abs($cf)));
                        }
                        if (($cf < 0) && ($cf * $cflama >=0)) {
                            $cflama=$cflama+($cf * (1 + $cflama));
                        }
                    }
                }
            }
            $xxx = $rpenyakit->id;
            if($cflama > 0){
                $arpenyakit += array($xxx => number_format($cflama, 4));
            }
        }
        arsort($arpenyakit);
        if ($arpenyakit == null) {
            return redirect(route('diagnosa'))->with(['pesan'=>'harap pilih minimal 5 gejala']);
        }

        $inpgejala = serialize($argej);
        $inppenyakit = serialize($arpenyakit);

        $np1 = 0;

        foreach ($arpenyakit as $key1 => $value1) {
            $np1++;
            $idpkt1[$np1] = $key1;
            $nmpkt1[$np1] = $arpkt[$key1];
            $vlpkt1[$np1] = $value1;
        }
        $nama = Auth::user()->name;
        $diagnosa = Diagnosa::factory()->create([
            'nama'      =>  $nama,
            'tanggal'   =>  Carbon::now(),
            'penyakit'  =>  $inppenyakit,
            'gejala'    =>  $inpgejala,
            'idpenyakit'=>  $idpkt1[1],
            'nilai'     =>  $vlpkt1[1]
        ]);

        return back()->with(['namapenyakit' => $nmpkt1, 'nilai' => $vlpkt1]);
    }

    public function riwayat() {
        $this->authorize('auth');
        $diagnosa = Diagnosa::select('diagnosas.created_at as waktu', 'diagnosas.*', 'penyakits.*')->join('penyakits', 'diagnosas.idpenyakit', '=','penyakits.id')->where('nama', Auth::user()->name)->orderBy('diagnosas.created_at','DESC')->paginate(10);
        // dd($diagnosa);
        return view('riwayat', compact('diagnosa'));
    }
}
