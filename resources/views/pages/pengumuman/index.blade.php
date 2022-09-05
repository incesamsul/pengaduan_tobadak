@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data Pengumuman</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data ..." id="searchbox">
                        <button type="button" class="btn-tambah btn bg-main text-white float-right" data-toggle="modal" data-target="#modalPengumuman"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></th>
                                <td>Isi pengumuman</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->isi_pengumuman }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">

                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalPengumuman" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>

                                                <a data-id_pengumuman="{{ $row->id_pengumuman }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
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
  <div class="modal fade" id="modalPengumuman" tabindex="-1" aria-labelledby="modalPengaduanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPengaduanLabel">Pengaduan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formPengaduan" action="{{ URL::to("sekdes/create_pengumuman") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="isi_pengumuman">isi pengumuman</label>
                <input type="hidden" id="id" name="id">
                <textarea name="isi_pengumuman" id="isi_pengumuman" cols="30" rows="10" class="form-control" required></textarea>
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



@endsection
@section('script')
<script>
    $(document).ready(function() {

        $('.btn-tambah').on('click',function(){
            $('#formPengaduan').attr('action','/sekdes/create_pengumuman');
        });

        $('.table-user tbody').on('click', 'tr td a.edit', function() {
            let dataEdit = $(this).data('edit');
            console.log(dataEdit);
            $('#id').val(dataEdit.id_pengumuman);
            $('#isi_pengumuman').val(dataEdit.isi_pengumuman);
            $('#foto_pengaduan').prop('required',false);
            $('#formPengaduan').attr('action','/sekdes/update_pengumuman');
        })

        $('.table-user tbody').on('click', 'tr td a.edit-status', function() {
            let dataEdit = $(this).data('edit');
            console.log(dataEdit);
            $('#id_update').val(dataEdit.id_pengumuman);
            $('#status_pengaduan').val(dataEdit.status_pengaduan);
        })
        // TOMBOL HAPUS USER
        $('.table-user tbody').on('click', 'tr td a.hapus', function() {
            let id_pengumuman = $(this).data('id_pengumuman');
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
                        , url: '/sekdes/delete_pengumuman'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_pengumuman: id_pengumuman
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

    $('#liPengguna').addClass('active');
    $('#liManajemenPengguna').addClass('active');

</script>
@endsection
