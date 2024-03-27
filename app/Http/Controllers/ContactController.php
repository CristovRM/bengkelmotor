<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Logic untuk menampilkan halaman utama
        return view('contact');
    }
}
