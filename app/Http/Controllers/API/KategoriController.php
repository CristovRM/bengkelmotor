<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderby('nama_kategori','asc')->get();
        return response()->json([
            'status' => true,
            'massage' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
       $dataKategori = new Kategori;

       $rules = [
        'nama_kategori' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal Memasukkan Data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataKategori->nama_kategori = $request->nama_kategori;
       
       $post = $dataKategori->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses Memasukkan Data',

       ]);

    }

    public function show(string $id)
    {
        $data = Kategori::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'massage' => 'Data Ditemukan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak Ditemukan'
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        $dataKategori = Kategori::find($id);
        if (empty($dataKategori)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }

       $rules = [
        'nama_kategori' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal melakukan update data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataKategori->nama_kategori = $request->nama_kategori;
       
       $post = $dataKategori->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan update data',

       ]);
    }

    public function destroy(string $id)
    {
        $dataKategori = Kategori::find($id);
        if (empty($dataKategori)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }
       
       $post = $dataKategori->delete();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan delete data',

       ]);
    }
}

