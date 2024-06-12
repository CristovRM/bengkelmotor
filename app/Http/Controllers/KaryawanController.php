<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KaryawanController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/karyawan');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $karyawan = $data['data'];
                return view('karyawan.index', compact('karyawan'));
            } else {
                return view('karyawan.index')->withErrors(['msg' => 'Gagal mengambil data karyawan.']);
            }
        } catch (\Exception $e) {
            return view('karyawan.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {

        try {
            $response = Http::post('http://127.0.0.1:8000/api/karyawan', $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
            } else {
                return redirect()->route('karyawan.create')->withErrors(['msg' => 'Gagal menambahkan karyawan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/karyawan/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $karyawan = $data['data'];
                return view('karyawan.show', compact('karyawan'));
            } else {
                return redirect()->route('karyawan.index')->withErrors(['msg' => 'karyawan tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/karyawan/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $karyawan = $data['data'];
                return view('karyawan.edit', compact('karyawan'));
            } else {
                return redirect()->route('karyawan.index')->withErrors(['msg' => 'Karyawan tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $response = Http::put("http://127.0.0.1:8000/api/karyawan/{$id}", $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diperbarui.');
            } else {
                return redirect()->route('karyawan.edit', $id)->withErrors(['msg' => 'Gagal memperbarui karyawan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.edit', $id)->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("http://127.0.0.1:8000/api/karyawan/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('karyawan.index')->with('success', 'karyawan berhasil dihapus.');
            } else {
                return redirect()->route('karyawan.index')->withErrors(['msg' => 'Gagal menghapus data karyawan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
