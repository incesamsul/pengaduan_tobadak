<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Pengaduan;
use App\Models\Pengumuman;

class Home extends Controller
{
    public function beranda()
    {
        $data['informasi'] = Informasi::all();
        $data['pengumuman'] = Pengumuman::all();
        $data['pengaduan'] = Pengaduan::all();
        return view('halaman_depan.beranda', $data);
    }
}
