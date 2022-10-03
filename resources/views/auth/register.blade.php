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
				<a class="navbar-brand" href="{{ URL::to('/') }}">
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
							<a class="nav-link" href="#registrasi">Registrasi</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<!-- Page Content -->
	<!-- Banner Starts Here -->
	<div class="banner header-text">

	</div>


	<div class="call-to-action mt-5" id="registrasi">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading">
						<h2>Registrasi</h2>
					</div>
				</div>

					<div class="col-md-12">
						<div class="inner-content">
							<div class="row">
								<div class="col-md-12">
                                    <form action="{{ URL::to('/register') }}" method="POST">
                                        @csrf
                                        @if (session('message'))
                                        <div class="alert alert-success">{{ session('message') }}</div>
                                        @endif
                                        <div class="form-group">
                                            <label for="nama">nama</label>
                                            <input required type="text" class="form-control" name="nama" id="nama">
                                        </div>
                                        <div class="form-group">
                                            <input required type="hidden" class="form-control" name="email" id="email" value="{{ uniqid() }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">nik</label>
                                            <input required type="text" class="form-control" name="nik" id="nik">
                                        </div>
                                        <div class="form-group">
                                            <label for="dusun">dusun</label>
                                            <input required type="text" class="form-control" name="dusun" id="dusun">
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">telp</label>
                                            <input required type="text" class="form-control" name="telp" id="telp">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn bg-main text-white" type="submit">Register</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
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
