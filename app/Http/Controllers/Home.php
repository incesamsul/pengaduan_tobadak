<?php

namespace App\Http\Controllers;




class Home extends Controller
{
    public function beranda()
    {
        return view('halaman_depan.beranda');
    }
}
