<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class Sekdes extends Controller
{
    public function pengaduan()
    {
        $data['pengaduan'] = Pengaduan::all();
        $data['kategori'] = Kategori::all();
        return view('pages.pengaduan.index', $data);
    }

    public function updateStatusPengaduan(Request $request)
    {

        if ($request->status_pengaduan == 'selesai') {
            Pengaduan::where('id_pengaduan', $request->id_update)->update([
                'selesai' => '1'
            ]);
            return redirect()->back()->with('message', 'pengaduan berhasil di update');
        }
        Pengaduan::where('id_pengaduan', $request->id_update)->update([
            'status_pengaduan' => $request->status_pengaduan,
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect()->back()->with('message', 'pengaduan berhasil di update');
    }
}
