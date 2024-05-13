<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::orderby('nama_produk','asc')->get();
        return response()->json([
            'status' => true,
            'massage' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
       $dataProduk = new Produk;

       $rules = [
        'id' => 'required',
        'id_supplier' => 'required',
        'nama_produk' => 'required',
        'merk' => 'required',
        'harga_beli' => 'required',
        'diskon' => 'required',
        'harga_jual' => 'required',
        'stok' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal Memasukkan Data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataProduk->id = $request->id;
       $dataProduk->id_supplier = $request->id_supplier;
       $dataProduk->nama_produk = $request->nama_produk;
       $dataProduk->merk = $request->merk;
       $dataProduk->harga_beli = $request->harga_beli;
       $dataProduk->diskon = $request->diskon;
       $dataProduk->harga_jual = $request->harga_jual;
       $dataProduk->stok = $request->stok;
       
       $post = $dataProduk->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses Memasukkan Data',

       ]);

    }

    public function show(string $id)
    {
        $data = Produk::find($id);
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
        $dataProduk = Produk::find($id);
        if (empty($dataProduk)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }

       $rules = [
        'id' => 'required',
        'id_supplier' => 'required',
        'nama_produk' => 'required',
        'merk' => 'required',
        'harga_beli' => 'required',
        'diskon' => 'required',
        'harga_jual' => 'required',
        'stok' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal melakukan update data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataProduk->id = $request->id;
       $dataProduk->id_supplier = $request->id_supplier;
       $dataProduk->nama_produk = $request->nama_produk;
       $dataProduk->merk = $request->merk;
       $dataProduk->harga_beli = $request->harga_beli;
       $dataProduk->diskon = $request->diskon;
       $dataProduk->harga_jual = $request->harga_jual;
       $dataProduk->stok = $request->stok;
       
       $post = $dataProduk->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan update data',

       ]);
    }

    public function destroy(string $id)
    {
        $dataProduk = Produk::find($id);
        if (empty($dataProduk)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }
       
       $post = $dataProduk->delete();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan delete data',

       ]);
    }
}

