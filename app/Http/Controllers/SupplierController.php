<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Produk;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    public function data()
    {
        $supplier = Supplier::orderBy('id_supplier', 'desc')->get();

        return datatables()
            ->of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('supplier.update', $supplier->id_supplier) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('supplier.destroy', $supplier->id_supplier) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat'=> 'required',
        ]);

        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;

        if ($supplier->save()) {
            return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
        } else {
            return back()->withInput()->withErrors('Gagal menambahkan supplier.');
        }
    }

    public function show($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $produk = $supplier->id_produk; // Mendapatkan produk yang dimiliki oleh supplier
        return view('supplier.show', compact('supplier', 'produk'));
    }

    public function edit($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id_supplier)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'alamat'=> 'required',
        ]);

        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat = $request->alamat;

        if ($supplier->save()) {
            return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui.');
        } else {
            return back()->withInput()->withErrors('Gagal memperbarui supplier.');
        }
    }

    public function destroy($id_supplier)
    {
        $supplier = Supplier::findOrFail($id_supplier);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
    }
}
