<?php

namespace App\Http\Controllers;

use App\Models\pakanModel;
use Illuminate\Http\Request;

class pakanController extends Controller
{

    public function index()
    {
        $master_pakan = pakanModel::orderBy('id', 'DESC')->get();
        return view("content.pakan.informasiPakan", [
            'master_pakan' => $master_pakan,
        ]);
    }


    public function create()
    {
        return view('content.pakan.tambahPakan');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'jenispakan' => 'required',
            'totalpakan' => 'required'
        ]);

        pakanModel::create([
            'jenis_pakan' => $request->jenispakan,
            'total_pakan' => $request->totalpakan
        ]);
        return redirect('/informasi-pakan')->with(['success' => 'Data Berhasil Ditambahkan']);
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $editPakan = pakanModel::select('*')->where('id', $id)->get();
        return view('content.pakan.editPakan', ['editPakan' => $editPakan]);
    }


    public function update(Request $request)
    {

        $this->validate($request, [

            'jenispakan' => 'required',
            'totalpakan' => 'required'
        ]);

        pakanModel::where('id', $request->id)->update([
            'jenis_pakan' => $request->jenispakan,
            'total_pakan' => $request->totalpakan
        ]);
        return redirect('/informasi-pakan')->with(['success' => 'Data Berhasil Diupdate
        ']);
    }


    public function destroy($id)
    {
        pakanModel::where('id', $id)->delete();
        return redirect('/informasi-pakan')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
