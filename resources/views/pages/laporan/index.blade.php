@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Pengaduan</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data ..." id="searchbox">
                        <button class="btn bg-main text-white"><a href="{{ URL::to('/sekdes/cetak_laporan') }}" type="button" class="btn-tambah btn bg-main text-white float-right"><i class="fas fa-print"></i></a></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
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
                                <td>video</td>
                                <td>foto </td>
                                <td>Status</td>
                                <td>selesai</td>
                                <td>Tanggapan kepala desa</td>
                                <td></td>
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
                                        <a target="_blank" class="btn btn-primary" href="{{ asset('data/video_pengaduan/'. $row->video) }}">lihat</a>
                                    </td>
                                    <td><img src="{{ asset('data/foto_pengaduan/'.$row->foto) }}" alt="" class="img-thumbnail" width="100"></td>
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
                                        @if ($row->selesai == '0')
                                            <span class="badge badge-danger">Belum selesai</span>
                                        @else
                                            <span class="badge badge-success">sudah selesai</span>
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
                    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Modal -->
  <div class="modal fade" id="modalPengaduan" tabindex="-1" aria-labelledby="modalPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPengaduanLabel">Pengaduan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formPengaduan" action="{{ URL::to("masyarakat/create_pengaduan") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="isi_pengaduan">isi pengaduan</label>
                <input type="hidden" id="id" name="id">
                <textarea name="isi_pengaduan" id="isi_pengaduan" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="kategori_pengaduan">Kategori pengaduan</label>
                <select name="kategori_pengaduan" id="kategori_pengaduan" class="form-control">
                    <option value="">-- pilih kategori --</option>
                    @foreach ($kategori as $row)
                        <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="foto_pengaduan">Foto pengaduan</label>
                <input type="file" name="foto_pengaduan" id="foto_pengaduan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="video_pengaduan">Video pengaduan</label>
                <input type="file" name="video_pengaduan" id="video_pengaduan" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-main text-white">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modalUpdateStatus" tabindex="-1" aria-labelledby="modalUpdateStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalUpdateStatusLabel">Update status pengaduan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formUpdateStatus" action="{{ URL::to("sekdes/update_status_pengaduan") }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="status_pengaduan">Status pengaduan</label>
                  <input type="hidden" id="id_update" name="id_update">
                  <select name="status_pengaduan" id="status_pengaduan" class="form-control">
                      @if (auth()->user()->role == 'sekdes')
                      <option>antri</option>
                      <option>proses</option>
                      <option>selesai</option>
                      @endif
                      @if (auth()->user()->role == 'kepala_desa')
                      <option>diterima</option>
                      <option>ditolak</option>
                      @endif
                  </select>
              </div>
              @if (auth()->user()->role == 'kepala_desa')
              <div class="form-group">
                <label for="tanggapan">tanggapan</label>
                <textarea class="form-control my-textarea" name="tanggapan" id="tanggapan"></textarea>
            </div>
              @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn bg-main text-white">Simpan</button>
          </form>
          </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('.btn-tambah').on('click',function(){
            $('#formPengaduan').attr('action','/masyarakat/create_pengaduan');
        });

        $('.table-user tbody').on('click', 'tr td a.edit', function() {
            let dataEdit = $(this).data('edit');
            console.log(dataEdit);
            $('#id').val(dataEdit.id_pengaduan);
            $('#isi_pengaduan').val(dataEdit.isi_pengaduan);
            $('#foto_pengaduan').prop('required',false);
            $('#formPengaduan').attr('action','/masyarakat/update_pengaduan');
        })

        $('.table-user tbody').on('click', 'tr td a.edit-status', function() {
            let dataEdit = $(this).data('edit');
            console.log(dataEdit);
            $('#id_update').val(dataEdit.id_pengaduan);
            $('#status_pengaduan').val(dataEdit.status_pengaduan);
        })
        // TOMBOL HAPUS USER
        $('.table-user tbody').on('click', 'tr td a.hapus', function() {
            let id_pengaduan = $(this).data('id_pengaduan');
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/masyarakat/delete_pengaduan'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_pengaduan: id_pengaduan
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                    })
                }
            })
        });


    });

    $('#liLaporan').addClass('active');

</script>
@endsection
