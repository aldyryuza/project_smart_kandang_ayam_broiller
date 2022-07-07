<?php

namespace App\Http\Controllers;

use App\Models\kandangModel;
use App\Models\rekapHarianModel;
use Illuminate\Http\Request;


class detailInformasiController extends Controller
{

    public function index($id)
    {

        $detail = kandangModel::get();
        return view('content.kandang.detailInformasiKandang', [
            'detail' => kandangModel::findOrFail($id)
        ]);
    }

    public function create($id)
    {
        return view('content.informasi-budidaya.tambahInformasiBudidaya', ['detail' => kandangModel::findOrFail($id)]);
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'tanggal' => 'required',
            'idKandang' => 'required',
            'idPakan' => 'required',
            'ayamMati' => 'required',
            'pakanKeluar' => 'required',
            'status' => 'required',

        ]);


        rekapHarianModel::create([
            'tanggal' => $request->tanggal,
            'id_kandang' => $request->idKandang,
            'id_pakan' => $request->idPakan,
            'ayam_mati' => $request->ayamMati,
            'pakan_keluar' => $request->pakanKeluar,
            // 'status' => $request->status,
        ]);



        return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $editInformasi = rekapHarianModel::select('*')->where('id', $id)->get();
        return view('content.informasi-budidaya.editInformasiBudidaya', [
            'editInformasi' => $editInformasi,

        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'id' => 'required',
            'idKandang' => 'required',
            'idPakan' => 'required',
            'ayamMati' => 'required',
            'pakanKeluar' => 'required',

        ]);

        rekapHarianModel::where('id', $request->id)->update([
            'tanggal' => $request->tanggal,
            'id_kandang' => $request->idKandang,
            'id_pakan' => $request->idPakan,
            'ayam_mati' => $request->ayamMati,
            'pakan_keluar' => $request->pakanKeluar,
        ]);

        return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil DiUpdate']);
    }


    public function destroy(Request $request, $id)
    {

        rekapHarianModel::where('id', $id)->delete();
        return redirect('/detail/' . $request->idKandang)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
