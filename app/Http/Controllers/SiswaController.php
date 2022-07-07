<?php

namespace App\Http\Controllers;

use App\Models\siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::orderBy('id', 'DESC')->get();
        return view('content.siswa', compact('siswa'));
    }
    public function store(Request $request)
    {

        $siswa = new siswa();
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->hp = $request->hp;
        $siswa->save();
        return response()->json([
            'status' => 200,
            'message' => "Data Berhasil Ditambahkan",

        ]);



        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required |max:100',
        //     'jenis_kelamin' => 'required|max:100',
        //     'hp' => 'required|max:100',
        // ]);


        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $validator->getMessageBag(),

        //     ]);
        // } else {
        //     $siswa = new siswa;
        //     $siswa->nama = $request->input('nama');
        //     $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        //     $siswa->hp = $request->input('hp');
        //     $siswa->save();
        //     return response()->json([
        //         'status' => 200,
        //         'message' => "Data Berhasil Ditambahkan",

        //     ]);
        // }
    }

    public function getId($id)
    {
        $siswa = siswa::find($id);
        return response()->json($siswa);
    }

    public function updateSiswa(Request $request)
    {
        $siswa = siswa::find($request->id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->hp = $request->hp;
        $siswa->save();
        return response()->json([
            'status' => 200,
            'message' => "Data Berhasil Diupdate",

        ]);
    }
};
