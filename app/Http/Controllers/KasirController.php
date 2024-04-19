<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('kasir.index', compact('transactions'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_time' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        Transaction::create($request->all());

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('kasir.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('kasir.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaction_time' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        Transaction::whereId($id)->update($request->all());

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
