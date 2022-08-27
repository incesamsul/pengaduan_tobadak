@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex  justify-content-between">
                    <h4>Data kategori</h4>
                    <div class="table-tools d-flex justify-content-around ">
                        <input type="text" class="form-control card-form-header mr-3" placeholder="Cari Data Pengguna ..." id="cari-data-pengguna">
                        <select class="custom-select form-control mr-3" id="filter-data-pengguna">
                            <option value="" selected>Filter</option>
                            <option value=""></option>
                        </select>
                        <button id="btn-tambah" class="btn bg-main text-white" data-toggle="modal" data-target="#modalkategori"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-user table-action-hover" id="table-data">
                        <thead>
                            <tr>
                                <th>id kategori</th>
                                <th>Nama kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $row)
                                <tr>
                                    <td>{{ $row->id_kategori }}</td>
                                    <td>{{ $row->nama_kategori }}</td>
                                    <td class="option">
                                        <div class="btn-group dropleft btn-option">
                                            <i type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </i>
                                            <div class="dropdown-menu">
                                                <a data-edit='@json($row)' data-toggle="modal" data-target="#modalkategori" class="dropdown-item edit" href="#"><i class="fas fa-pen"> Edit</i></a>
                                                <a data-hapus="{{ $row->id_kategori }}" class="dropdown-item hapus" href="#"><i class="fas fa-trash"> Hapus</i></a>
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
  <div class="modal fade" id="modalkategori" tabindex="-1" aria-labelledby="modalkategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalkategoriLabel">Tambah data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="form-data" action="{{ URL::to('/admin/create_kategori') }}" method="POST">
                @csrf
            <div class="form-group">
              <input type="hidden" class="form-control" name="id" id="id">
              <label for="nama_kategori">nama kategori</label>
              <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
          <button type="submit" class="btn bg-main text-white">Simpan</button>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>

    $(document).on('click','tr td .edit', function(){
        let edit = $(this).data('edit');
        $('#nama_kategori').val(edit.nama_kategori);
        $('#id').val(edit.id_kategori);
        $('#form-data').attr('action','/admin/update_kategori');
    })

    $('#btn-tambah').on('click',function(){
        $('#form-data').attr('action','/admin/create_kategori');
    })


    $(document).on('click', 'tr td a.hapus', function() {
    let hapus = $(this).data('hapus');
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
                    , url: '/admin/delete_kategori'
                    , method: 'post'
                    , dataType: 'json'
                    , data: {
                        hapus: hapus
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



    $('#likategori').addClass('active');

</script>
@endsection
