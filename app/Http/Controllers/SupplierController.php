<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SupplierController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/supplier');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $supplier = $data['data'];
                return view('supplier.index', compact('supplier'));
            } else {
                return view('supplier.index')->withErrors(['msg' => 'Gagal mengambil data supplier.']);
            }
        } catch (\Exception $e) {
            return view('supplier.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {

        try {
            $response = Http::post('http://127.0.0.1:8000/api/supplier', $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('supplier.index')->with('success', 'Supplier berhasil ditambahkan.');
            } else {
                return redirect()->route('supplier.create')->withErrors(['msg' => 'Gagal menambahkan supplier.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('supplier.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/supplier/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $supplier = $data['data'];
                return view('supplier.show', compact('supplier' , 'produk'));
            } else {
                return redirect()->route('supplier.index')->withErrors(['msg' => 'Supplier tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/supplier/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $supplier = $data['data'];
                return view('supplier.edit', compact('supplier'));
            } else {
                return redirect()->route('supplier.index')->withErrors(['msg' => 'Supplier tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $response = Http::put("http://127.0.0.1:8000/api/supplier/{$id}", $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui.');
            } else {
                return redirect()->route('supplier.edit', $id)->withErrors(['msg' => 'Gagal memperbarui supplier.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('supplier.edit', $id)->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("http://127.0.0.1:8000/api/supplier/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('supplier.index')->with('success', 'Supplier berhasil dihapus.');
            } else {
                return redirect()->route('supplier.index')->withErrors(['msg' => 'Gagal menghapus supplier.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('supplier.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
