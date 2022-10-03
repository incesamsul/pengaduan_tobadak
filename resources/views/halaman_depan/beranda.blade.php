<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

	<title>pengaduan tobadak</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/home.css') }}">
	<link rel="stylesheet" href="assets/template/assets/css/owl.css">

</head>

<body>

	<!-- Header -->
	<header class="">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="">
					<h2>Pengaduan <em>Masyarakat</em></h2>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('/login') }}">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ URL::to('/registrasi') }}">Registrasi</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- Page Content -->
	<!-- Banner Starts Here -->
	<div class="banner header-text">
		<div class="owl-banner owl-carousel">
			<div class="banner-item-01">
				<div class="text-content">
					<h4>SISTEM INFORMASI</h4>
					<h2>Pengaduan masyarakat</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner Ends Here -->
	{{-- <div class="container">
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="section-heading">
					<h2>Cek Penerima</h2>
				</div>
			</div>
			<div class="col-md-6">

				<div class="input-group mb-3">
					<input type="text" name="search_penerima" id="search_penerima" class="form-control" placeholder="Masukkan nik..." autocomplete="off" autofocus>
					<div class="input-group-append">
						<input type="submit" class="btn btn-danger " name="submit">
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div> --}}
	{{-- <div class="latest-products mb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Jenis Pengaduan masyarakat</h2>
						<!-- Button trigger modal -->
					</div>
				</div>

					<div class="col-md-3">
						<div class="product-item text-center">
							<a data-toggle="modal" data-target="#modalBantuan" href="#"><img src="  " alt=""></a>
							<div class="down-content">
								<h4>what</h4>
							</div>
						</div>
					</div>

			</div>
		</div>
	</div> --}}


	<div class="call-to-action mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Informasi</h2>
					</div>
				</div>

                <div class="col-md-8">
                    @foreach ($informasi as $row)
                    <p>{{ $row->isi_informasi }}</p>
                    @endforeach
                </div>

			</div>
		</div>
	</div>

	<div class="call-to-action mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Pengumuman</h2>
					</div>
				</div>

                <div class="col-md-8">
                    @foreach ($pengumuman as $row)
                    <p>{{ $row->isi_pengumuman }}</p>
                    @endforeach
                </div>

			</div>
		</div>
	</div>

	<div class="call-to-action mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Pengaduan</h2>
					</div>
				</div>

                <div class="col-md-8">
                    @foreach ($pengaduan as $row)
                    <p>{{ $row->isi_pengaduan }}</p>
                    @endforeach
                </div>

			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inner-content">
						<p>Copyright &copy; 2020 </p>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Bootstrap core JavaScript -->
	<script src="assets/template/vendor/jquery/jquery.min.js"></script>
	<script src="assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


	<!-- Additional Scripts -->
	<script src="assets/template/assets/js/custom.js"></script>
	<script src="assets/template/assets/js/owl.js"></script>
	<script src="assets/template/assets/js/slick.js"></script>
	<script src="assets/template/assets/js/isotope.js"></script>
	<script src="assets/template/assets/js/accordions.js"></script>


	<script language="text/Javascript">
		cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
		function clearField(t) { //declaring the array outside of the
			if (!cleared[t.id]) { // function makes it static and global
				cleared[t.id] = 1; // you could use true and false, but that's more typing
				t.value = ''; // with more chance of typos
				t.style.color = '#fff';
			}
		}
	</script>



</body>

</html>
