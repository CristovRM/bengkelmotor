<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
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

    // Menampilkan form untuk menambah kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Lakukan validasi request jika diperlukan

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

    // Menampilkan form untuk mengedit kategori
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

    // Menyimpan perubahan pada kategori ke database
    public function update(Request $request, $id)
    {
        // Lakukan validasi request jika diperlukan

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

    // Menghapus kategori dari database
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
