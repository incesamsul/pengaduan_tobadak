@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-main text-white">
                    <i class="fas fa-spinner"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pengaduan antri </h4>
                    </div>
                    <div class="card-body">
                        {{ count($antri) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-warning text-white">
                    <i class="fas fa-tasks"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pengaduan diproses </h4>
                    </div>
                    <div class="card-body">
                        {{ count($proses) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-success text-white">
                    <i class="fas fa-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pengaduan diterima </h4>
                    </div>
                    <div class="card-body">
                        {{ count($diterima) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-dark bg-danger text-white">
                    <i class="fas fa-times"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pengaduan ditolak </h4>
                    </div>
                    <div class="card-body">
                        {{ count($ditolak) }}
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Anda berada di halaman dashboard</h4>
                </div>
                <div class="card-body">
                    <h5>Hi, Selamat datang</h5>
                    <p>Segala aktifitas yang anda lakukan akan kami pantau, mhon gunakan aplikasi ini dengan bijaksana.
                    </p>
                    <p>Dengan adanya apilkasi ini kami berharap agar mempermudah Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero quibusdam quia rem ab, aspernatur nisi asperiores laudantium repellendus, optio ad sequi! Blanditiis quo, rerum eligendi maiores dicta ipsum iure! Inventore!lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam aliquid fuga ea expedita culpa praesentium provident magnam. Iste, illum! Nesciunt ullam itaque ratione asperiores eaque corporis minima, recusandae quo eligendi!</p>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('script')
<script>
    $('#liDashboard').addClass('active');

</script>
@endsection
