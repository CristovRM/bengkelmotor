<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    Public function getData()
    {
    //Logika untuk mendapatkan array data
    $dataBarang = [
        ['id' => 1, 'nama' => 'Ban Federal', 'harga' => 125000],
        ['id' => 2, 'nama' => 'Spion Nmax', 'harga' => 61800],
        ['id' => 3, 'nama' => 'HandGrip RCB', 'harga' => 56800],
        ['id' => 4, 'nama' => 'Sarung Jok', 'harga' => 25000],
        ['id' => 5, 'nama' => 'Kunci Gembok Cakram AHM', 'harga' => 23900],
    ];

    return $dataBarang;
    }

    public function tampilkan(){
        $data = $this->getdata();
        return view('list_barang', compact('data'));
    }
}
