<?php

namespace App\Http\Controllers;

use App\Models\iotMOdel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class apiIotController extends Controller
{

    public function index()
    {
        //get data from table posts
        $posts = iotMOdel::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Arduino',
            'data'    => $posts
        ], 200);
    }


    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'kelembapan' => 'required',
                'suhu'   => 'required',
                'amonia'   => 'required',
                'relay1'   => 'required',
                'relay2'   => 'required',
            ],
            [
                'kelembapan.required' => 'Masukkan Title Post !',
                'suhu.required' => 'Masukkan Content Post !',
                'amonia.required' => 'Masukkan Kadar Amonia !',
                'relay1.required' => 'Pilih Relay 1 !',
                'relay2.required' => 'Pilih Relay 2 !',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = iotMOdel::create([
                'kelembapan'     => $request->input('kelembapan'),
                'suhu'     => $request->input('suhu'),
                'amonia'   => $request->input('amonia'),
                'relay1'   => $request->input('relay1'),
                'relay2'   => $request->input('relay2')
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 401);
            }
        }
    }



    // Fungsi Relay 1
    public function show($id)
    {

        return DB::select('select relay1  from tabel_iot where id = ?', [$id]);


        // return response()->json([
        //     'status' => 200,
        //     'message' => "Data Perangakat",
        //     'data' => $idpost
        // ]);
    }

    // Fungsi Relay 2
    public function show1($id)
    {

        return  DB::select('select relay2  from tabel_iot where id = ?', [$id]);


        // return response()->json([
        //     'status' => 200,
        //     'message' => "Data Perangakat",
        //     'data' => $idpost
        // ]);
    }


    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make(
            $request->all(),
            [
                'kelembapan' => 'required',
                'suhu'   => 'required',
                'amonia'   => 'required',
                'relay1',
                'relay2',


            ],
            [
                'kelembapan.required' => 'Masukkan Kadar Kelembapan !',
                'suhu.required' => 'Masukan Suhu !',
                'amonia.required' => 'Masukkan Kadar Amonia !',

            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ], 401);
        } else {

            $post = iotMOdel::whereId($request->input('id'))->update([
                'kelembapan'     => $request->input('kelembapan'),
                'suhu'     => $request->input('suhu'),
                'amonia'   => $request->input('amonia'),
                'relay1'   => $request->input('relay1'),
                'relay2'   => $request->input('relay2'),

            ]);


            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 401);
            }
        }
    }
}
