<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       // $data = [
       //     'nama'=> 'Doraemon',
       //     'pekerjaan' => 'Developer',
       // ];
       // return view('home')->with($data);
    
<<<<<<< HEAD
        $nama = "Nobita";
        $pekerjaan = "Student";
        return view('home', compact('nama','pekerjaan'));
=======
    $nama = "Nobita";
    $pekerjaan = "Student";
    return view('home', compact('nama','pekerjaan'));
    
>>>>>>> 1f11e4b549bb83e65874176f1f091e873db1db3b
    }

    public function contact()
    {
        return view('contact');
    }
}
