<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak laporan</title>
    <style>
        body {
            /* color: rgba(0, 0, 0, 0.8); */
        }

        .full-width {
            width: 100%;
        }

        .logo {
            float: left;
            margin-bottom: 15px;
            margin-right: 5px;
            margin-left: 100px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .header {
            color: #000000;
            border-bottom: 4px double #000000;
            margin-bottom: 10px;
        }

        .header-text {
            text-align: center;
        }

        .header-text * {
            margin: 1px;
        }

        .header-text p {
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }

        table {
            font-size: 14px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header clearfix">
            <div class="logo">
                <img src="{{'data:image/png;base64,' . base64_encode(file_get_contents('img/png/logo.png'))}}" alt="image" width="100">
            </div>
            <div class="header-text">
                <br><br>
                <h4>LAPORAN PERBULAN</h4>
                <p>pengaduan masyarakat tobadak</p>
            </div>
        </div>

        <table class="full-width mt-10 mb-30" border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                    @if (auth()->user()->role == 'sekdes')
                    <td>Nama pengadu</td>
                    <td>nik</td>
                    @endif
                    <td>Isi </td>
                    <td>Tanggal</td>
                    <td>Kategori </td>

                    <td>Status</td>
                    <td>selesai</td>
                    <td>Tanggapan kepala desa</td>

                </tr>
            </thead>
            <tbody>
                @foreach ($laporan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        @if (auth()->user()->role == 'sekdes')
                        <td>{{ $row->masyarakat->name }}</td>
                        <td>{{ $row->masyarakat->nik ? $row->masyarakat->nik : 'none' }}</td>
                        @endif
                        <td>{{ $row->isi_pengaduan }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->kategori->nama_kategori }}</td>


                        <td>
                            @if ($row->status_pengaduan == 'antri')
                                <span class="badge badge-warning">dalam antrian</span>
                                @elseif ($row->status_pengaduan == 'proses')
                                <span class="badge badge-primary">diproses</span>
                                @elseif ($row->status_pengaduan == 'diterima')
                                <span class="badge badge-success">diterima</span>
                                @elseif ($row->status_pengaduan == 'ditolak')
                                <span class="badge badge-danger">ditolak</span>
                                @elseif ($row->status_pengaduan == 'selesai')
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </td>

                        <td>
                            {{ $row->tanggapan == '' ? 'belum ada tanggapan' : $row->tanggapan }}
                        </td>
                        <td class="option">
                            <div class="btn-group dropleft btn-option">
                                <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </i>
                                <div class="dropdown-menu">
                                    @if (auth()->user()->role == 'sekdes' || auth()->user()->role == 'kepala_desa')
                                        <a data-edit='@json($row)' data-toggle="modal" data-target="#modalUpdateStatus" class="dropdown-item edit-status" href="#"><i class="fas fa-pen"> Update status</i></a>
                                    @endif
                                    @if ($row->status_pengaduan == 'antri')
                                    <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengaduan" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                    @endif
                                    <a data-id_pengaduan="{{ $row->id_pengaduan }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>
</html>
