<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KategoriController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/kategori');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $kategori = $data['data'];
                return view('kategori.index', compact('kategori'));
            } else {
                return view('kategori.index')->withErrors(['msg' => 'Gagal mengambil data kategori.']);
            }
        } catch (\Exception $e) {
            return view('kategori.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {

        try {
            $response = Http::post('http://127.0.0.1:8000/api/kategori', $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
            } else {
                return redirect()->route('kategori.create')->withErrors(['msg' => 'Gagal menambahkan kategori.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('kategori.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/kategori/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $kategori = $data['data'];
                return view('kategori.show', compact('kategori'));
            } else {
                return redirect()->route('kategori.index')->withErrors(['msg' => 'Kategori tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/kategori/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $kategori = $data['data'];
                return view('kategori.edit', compact('kategori'));
            } else {
                return redirect()->route('kategori.index')->withErrors(['msg' => 'Kategori tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $response = Http::put("http://127.0.0.1:8000/api/kategori/{$id}", $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
            } else {
                return redirect()->route('kategori.edit', $id)->withErrors(['msg' => 'Gagal memperbarui kategori.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('kategori.edit', $id)->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("http://127.0.0.1:8000/api/kategori/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
            } else {
                return redirect()->route('kategori.index')->withErrors(['msg' => 'Gagal menghapus kategori.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
