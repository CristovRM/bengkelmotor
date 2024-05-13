<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::orderby('nama_supplier','asc')->get();
        return response()->json([
            'status' => true,
            'massage' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
       $dataSupplier = new Supplier;

       $rules = [
        'nama_supplier' => 'required',
        'alamat' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal Memasukkan Data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataSupplier->nama_supplier = $request->nama_supplier;
       $dataSupplier->alamat = $request->alamat;
       
       $post = $dataSupplier->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses Memasukkan Data',

       ]);

    }

    public function show(string $id)
    {
        $data = Supplier::find($id);
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
        $dataSupplier = Supplier::find($id);
        if (empty($dataSupplier)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }

       $rules = [
        'nama_supplier' => 'required',
        'alamat' => 'required',
       ];
       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'massage' => 'Gagal melakukan update data',
            'data' => $validator->errors()

        ]);

        
       }
       
       $dataSupplier->nama_supplier = $request->nama_supplier;
       $dataSupplier->alamat = $request->alamat;
       
       $post = $dataSupplier->save();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan update data',

       ]);
    }

    public function destroy(string $id)
    {
        $dataSupplier = Supplier::find($id);
        if (empty($dataSupplier)) {
            return response()->json([
                'status' => false,
                'massage' => 'Data tidak ditemukan',

            ], 404);
        }
       
       $post = $dataSupplier->delete();

       return response()->json([
        'status' => true,
        'massage' => 'Sukses melakukan delete data',

       ]);
    }
}

