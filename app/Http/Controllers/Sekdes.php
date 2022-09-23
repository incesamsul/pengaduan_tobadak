<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori;
use App\Models\Pengaduan;
use App\Models\Pengumuman;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class Sekdes extends Controller
{
    public function pengaduan()
    {
        $data['pengaduan'] = Pengaduan::all();
        $data['kategori'] = Kategori::all();
        return view('pages.pengaduan.index', $data);
    }

    public function laporan()
    {
        $data['laporan'] = Pengaduan::all();
        $data['kategori'] = Kategori::all();
        return view('pages.laporan.index', $data);
    }

    public function cetakLaporan()
    {

        $data['laporan'] = Pengaduan::all();
        $html = view('pages.cetak.laporan', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('Legal', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
        exit(0);
    }

    public function pengumuman()
    {
        $data['pengumuman'] = Pengumuman::all();
        return view('pages.pengumuman.index', $data);
    }

    public function informasi()
    {
        $data['informasi'] = Informasi::all();
        return view('pages.informasi.index', $data);
    }

    public function createPengumuman(Request $request)
    {
        Pengumuman::create([
            'isi_pengumuman' => $request->isi_pengumuman
        ]);

        return redirect()->back()->with('message', 'pengumuman berhasil di buat');
    }

    public function updatePengumuman(Request $request)
    {
        Pengumuman::where('id_pengumuman', $request->id)->update([
            'isi_pengumuman' => $request->isi_pengumuman
        ]);

        return redirect()->back()->with('message', 'pengumuman berhasil di update');
    }

    public function deletePengumuman(Request $request)
    {
        Pengumuman::where('id_pengumuman', $request->id_pengumuman)->delete();

        return 1;
    }

    // INFOMRASI
    public function createInformasi(Request $request)
    {
        Informasi::create([
            'isi_informasi' => $request->isi_informasi
        ]);

        return redirect()->back()->with('message', 'informasi berhasil di buat');
    }

    public function updateInformasi(Request $request)
    {
        Informasi::where('id_informasi', $request->id)->update([
            'isi_informasi' => $request->isi_informasi
        ]);

        return redirect()->back()->with('message', 'informasi berhasil di update');
    }

    public function deleteInformasi(Request $request)
    {
        Informasi::where('id_informasi', $request->id_informasi)->delete();

        return 1;
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
