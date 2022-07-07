<?php

namespace App\Http\Controllers;

use App\Models\kandangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class tambahKandangController extends Controller
{

    public function index()
    {

        $masterKandang = kandangModel::where('status', '=', '0')->get();
        return view('content.kandang.dashboardKandang', [
            'masterKandang' => $masterKandang
        ]);
    }



    public function create()
    {
        return view('content.kandang.tambahKandang');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaKandang' => 'required',
            'mac' => 'required|unique:master_kandang,mac',
            'populasiAyam' => 'required',
            'tgl_ayam_masuk' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('/tambah-kandang')
                ->withErrors($validator)
                ->withInput();
        }

        $data = new kandangModel();
        $data->alamat_kandang = $request->namaKandang;
        $data->mac = $request->mac;
        $data->populasi_ayam = $request->populasiAyam;
        $data->tanggal_ayam_masuk = $request->tgl_ayam_masuk;
        $data->save();

        return redirect('/home')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function edit($id)
    {
        $editKandang = kandangModel::select('*')->where('id', $id)->get();
        return view('content.kandang.editKandang', [
            'editKandang' => $editKandang
        ]);
    }


    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'namaKandang' => 'required',
            // 'mac' => 'required',
            'populasiAyam' => 'required',
            'tgl_ayam_masuk' => 'required',
            'status' => 'required',

        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        kandangModel::where('id', $request->id)->update([
            'alamat_kandang' => $request->namaKandang,
            'mac' => $request->mac,
            'populasi_ayam' => $request->populasiAyam,
            'tanggal_ayam_masuk' => $request->tgl_ayam_masuk,
            'status' => $request->status,
        ]);
        return redirect('/home')->with(['success' => 'Data Berhasil Diupdate
        ']);
    }


    public function destroy($id)
    {
        kandangModel::where('id', $id)->delete();
        return redirect('/home')->with(['success' => 'Data Berhasil Dihapus
        ']);
    }

    public function dataKandang()
    {
        $dataKandang = kandangModel::select('*')->get();
        return view('content.kandang.dataKandang', [
            'dataKandang' => $dataKandang
        ]);
    }
}
