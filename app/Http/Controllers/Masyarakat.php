<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class Masyarakat extends Controller
{
    public function pengaduan()
    {
        $data['pengaduan'] = Pengaduan::all();
        return view('pages.pengaduan.index', $data);
    }

    public function createPengaduan(Request $request)
    {
        $fileName = uniqid() . "." . $request->foto_pengaduan->extension();
        $request->foto_pengaduan->move(public_path('data/foto_pengaduan/'), $fileName);

        Pengaduan::create([
            'id_masyarakat' => auth()->user()->id,
            'isi_pengaduan' => $request->isi_pengaduan,
            'foto' => $fileName
        ]);

        return redirect()->back()->with('message', 'pengaduan berhasil di lakukan');
    }

    public function updatePengaduan(Request $request)
    {

        if ($request->foto_pengaduan) {
            $fileName = uniqid() . "." . $request->foto_pengaduan->extension();
            $request->foto_pengaduan->move(public_path('data/foto_pengaduan/'), $fileName);
            Pengaduan::where('id_pengaduan', $request->id)->update([
                'isi_pengaduan' => $request->isi_pengaduan,
                'foto' => $fileName
            ]);
        } else {
            Pengaduan::where('id_pengaduan', $request->id)->update([
                'isi_pengaduan' => $request->isi_pengaduan,
            ]);
        }

        return redirect()->back()->with('message', 'pengaduan berhasil di update');
    }

    public function deletePengaduan(Request $request)
    {
        Pengaduan::where('id_pengaduan', $request->id_pengaduan)->delete();
        return 1;
    }
}
