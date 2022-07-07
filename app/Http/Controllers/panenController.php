<?php

namespace App\Http\Controllers;

use App\Models\kandangModel;
use App\Models\panenModel;
use App\Models\rekapHarianModel;
use Illuminate\Http\Request;

class panenController extends Controller
{

    public function index()
    {
        //
    }


    public function create($id)
    {
        $detail = kandangModel::get();
        return view('content.panen.tambahPanen', [
            'detail' => kandangModel::findOrFail($id)
        ]);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'tanggalpanen' => 'required',
            'idKandang' => 'required',
            'populasiakhir' => 'required',
            'umurpanen' => 'required',
            'bobotPanen' => 'required',
            'hargapanen' => 'required',

        ]);

        panenModel::create([
            'tanggal' => $request->tanggalpanen,
            'id_kandang' => $request->idKandang,
            'umur_panen' => $request->umurpanen,
            'populasi_akhir' => $request->populasiakhir,
            'bobot_panen' => $request->bobotPanen,
            'harga_panen' => $request->hargapanen,
        ]);

        $tanggalPanen = $request->tanggalpanen;
        $rekap = rekapHarianModel::where('id_kandang', $request->idKandang)->get();
        foreach ($rekap as $r) {
            if ($r->deleted_at == null) {
                rekapHarianModel::where('id_kandang', $r->id_kandang)->update([
                    'deleted_at' => $tanggalPanen
                ]);
                kandangModel::where('id', $r->id_kandang)->update([
                    'status' => '1',
                    'mac' => null,
                    'populasi_ayam' => 0,
                ]);
            }
        }
        // return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil Ditambahkan']);
        return redirect('/home')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        $editPanen = panenModel::select('*')->where('id', $id)->get();
        return view('content.panen.editPanen', [
            'editPanen' => $editPanen,

        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'tanggalpanen' => 'required',
            'idKandang' => 'required',
            'id' => 'required',
            'populasiakhir' => 'required',
            'umurpanen' => 'required',
            'bobotPanen' => 'required',
            'hargapanen' => 'required',

        ]);


        panenModel::where('id', $request->id)->update([
            'tanggal' => $request->tanggalpanen,
            'id_kandang' => $request->idKandang,
            'umur_panen' => $request->umurpanen,
            'populasi_akhir' => $request->populasiakhir,
            'bobot_panen' => $request->bobotPanen,
            'harga_panen' => $request->hargapanen,
        ]);




        return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil DiUpdate']);
    }


    public function destroy(Request $request, $id)
    {

        panenModel::where('id', $id)->delete();
        return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
