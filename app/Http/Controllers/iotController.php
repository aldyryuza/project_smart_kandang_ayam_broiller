<?php

namespace App\Http\Controllers;

use App\Models\iotMOdel;
use Illuminate\Http\Request;


class iotController extends Controller
{

    public function index()
    {

        $perangkat = iotMOdel::all();
        return view('content.perangkat.tabelPerangkat', [
            'perangkat' => $perangkat
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',

        ]);

        iotMOdel::create([
            'id' => $request->id,

        ]);
        return redirect('/perangkat')->with(['success' => 'Data Berhasil Ditambahkan']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {

        iotMOdel::where('id', $request->id)->update([
            'relay1' => $request->relay1,

        ]);


        return response()->json([
            'status' => 200,
            'message' => "Data Berhasil Diubah",
        ]);
    }
    public function update2(Request $request)
    {

        iotMOdel::where('id', $request->id)->update([
            'relay2' => $request->relay2,

        ]);


        return response()->json([
            'status' => 200,
            'message' => "Data Berhasil Diubah",
        ]);
    }


    public function destroy($id)
    {
        iotMOdel::where('id', $id)->delete();
        return redirect('/perangkat')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
