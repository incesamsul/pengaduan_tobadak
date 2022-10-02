<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class Masyarakat extends Controller
{
    public function pengaduan()
    {
        $data['pengaduan'] = Pengaduan::where('id_masyarakat', auth()->user()->id)->get();
        $data['kategori'] = Kategori::all();
        return view('pages.pengaduan.index', $data);
    }

    public function createPengaduan(Request $request)
    {
        $fileName = uniqid() . "." . $request->foto_pengaduan->extension();
        $videoName = uniqid() . "." . $request->video_pengaduan->extension();
        $request->foto_pengaduan->move(public_path('data/foto_pengaduan/'), $fileName);
        $request->video_pengaduan->move(public_path('data/video_pengaduan/'), $videoName);

        $pengaduan = Pengaduan::where('id_masyarakat', auth()->user()->id)->where('id_kategori', $request->kategori_pengaduan)->first();

        if ($pengaduan) {
            return redirect()->back()->with('message', 'sudah ada pengaduan dgn kategori yg sama sebelumnya');
        }

        Pengaduan::create([
            'id_masyarakat' => auth()->user()->id,
            'id_kategori' => $request->kategori_pengaduan,
            'isi_pengaduan' => $request->isi_pengaduan,
            'foto' => $fileName,
            'video' => $videoName
        ]);

        return redirect()->back()->with('message', 'pengaduan berhasil di lakukan');
    }

    public function updatePengaduan(Request $request)
    {

        if ($request->video_pengaduan) {
            $fileName = uniqid() . "." . $request->video_pengaduan->extension();
            $request->video_pengaduan->move(public_path('data/video_pengaduan/'), $fileName);
            Pengaduan::where('id_pengaduan', $request->id)->update([
                'isi_pengaduan' => $request->isi_pengaduan,
                'video' => $fileName
            ]);
        }
        if ($request->foto_pengaduan) {
            $fileName = uniqid() . "." . $request->foto_pengaduan->extension();
            $request->foto_pengaduan->move(public_path('data/foto_pengaduan/'), $fileName);
            Pengaduan::where('id_pengaduan', $request->id)->update([
                'isi_pengaduan' => $request->isi_pengaduan,
                'foto' => $fileName
            ]);
        }
        Pengaduan::where('id_pengaduan', $request->id)->update([
            'isi_pengaduan' => $request->isi_pengaduan,
        ]);

        return redirect()->back()->with('message', 'pengaduan berhasil di update');
    }

    public function deletePengaduan(Request $request)
    {
        Pengaduan::where('id_pengaduan', $request->id_pengaduan)->delete();
        return 1;
    }
}
