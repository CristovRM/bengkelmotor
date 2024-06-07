<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MemberController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://127.0.0.1:8000/api/member');
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $member = $data['data'];
                return view('member.index', compact('member'));
            } else {
                return view('member.index')->withErrors(['msg' => 'Gagal mengambil data member.']);
            }
        } catch (\Exception $e) {
            return view('member.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {

        try {
            $response = Http::post('http://127.0.0.1:8000/api/member', $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan.');
            } else {
                return redirect()->route('member.create')->withErrors(['msg' => 'Gagal menambahkan member.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('member.create')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/member/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $member = $data['data'];
                return view('member.show', compact('member'));
            } else {
                return redirect()->route('member.index')->withErrors(['msg' => 'Member tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('member.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::get("http://127.0.0.1:8000/api/member/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                $member = $data['data'];
                return view('member.edit', compact('member'));
            } else {
                return redirect()->route('member.index')->withErrors(['msg' => 'Member tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('member.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $response = Http::put("http://127.0.0.1:8000/api/member/{$id}", $request->all());
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('member.index')->with('success', 'Member berhasil diperbarui.');
            } else {
                return redirect()->route('member.edit', $id)->withErrors(['msg' => 'Gagal memperbarui member.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('member.edit', $id)->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("http://127.0.0.1:8000/api/member/{$id}");
            $data = $response->json();

            if ($response->successful() && $data['status']) {
                return redirect()->route('member.index')->with('success', 'Member berhasil dihapus.');
            } else {
                return redirect()->route('member.index')->withErrors(['msg' => 'Gagal menghapus member.']);
            }
        } catch (\Exception $e) {
            return redirect()->route('member.index')->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
