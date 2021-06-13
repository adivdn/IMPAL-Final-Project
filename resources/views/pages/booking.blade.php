<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>DTRAIN.CJ | Proses</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<!-- boostrap -->
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">

	<!--     Fonts and icons     -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'> -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'> -->

	<!-- CSS Custom -->
	<link href="css/reset.css" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet">
</head>
<body>

	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container">
			<div class="dropdown">
	          <a class="btn bg-outline-white my-2 my-sm-0" id="dropmenu" data-toggle="dropdown" href="#"><i class="fas fa-bars"></i></a>
	          <div class="dropdown-menu dropdown-menu-left" style="">
			  <a class="dropdown-item text-navy" href="{{url('/dashboard')}}"><i class="fas fa-fw fa-home mr-3"></i>Home</a>
	          	<a class="dropdown-item text-navy" href="{{url('/profile')}}"><i class="fas fa-fw fa-smile mr-3"></i>My Profile</a>
	          	<a class="dropdown-item text-navy" href="{{url('/mybooking')}}"><i class="fas fa-fw fa-clipboard-list mr-3"></i>My Booking</a>
	          	<a class="dropdown-item text-navy" href="#"><i class="fas fa-fw fa-headset mr-3"></i>Contact Us</a>
	          </div>
	        </div>
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" height="40"></a>

			<form class="form-inline my-2 my-lg-0 ml-auto">
				<a href="{{route('logout')}}" class="btn bg-navy my-2 my-sm-0 widht-btn1">Logout</a>
			</form>
		</div>
		</div>
	</nav>
	@foreach($listData as $ld)
	<div class="container" style="margin-top:150px; margin-left:190px;">
		<h3 class="card-title">Booking Details</h3>
		<p class="card-text" style="font-size:20px;">Review your booking and fill in your details.</p>
		<div class="card w-75">
			<div class="card-body">
				<h5 class="card-title">{{$ld->nama_kereta}} - {{$ld->kelas}}</h5>
				<h6 class="card-text">Departure {{$ld->jam_keberangkatan}} </h6>
			</div>
			<div class="card-footer bg-transparent "><h5 class="card-title">Total Cost <div class="card-text" style="margin-left:500px; margin-top:-25px;">Rp. {{number_format($ld->harga,2)}}</div></h5></div>
		</div>

		<h3 class="card-title" style="margin-top:30px;">Traveller Details</h3>
		<form action="{{route('proses')}}" method="POST">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$ld->id}}">
		<input type="hidden" name="total_cost" value="{{$ld->harga}}">

		<div class="card w-75" style="margin-top:20px;">
			<div class="card-body">
				<div class="mb-3">
					<label for="title" class="form-label">Title</label>
					<select name="title" class="form-select" aria-label="Default select example">
						<option selected></option>
						<option value="mr">Mr</option>
						<option value="ms">Ms</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Fullname</label>
					<input class="form-control" type="text" id="formFile" name="name">
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">ID Type</label>
					<select name="type" class="form-select" aria-label="Default select example">
						<option selected></option>
						<option value="ktp">KTP</option>
						<option value="passport">Passport</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">ID Number</label>
					<input class="form-control" type="text" id="formFile" name="id_number">
				</div>
				<div class="mb-3">
					<label for="formFile" class="form-label">Mobile Number</label>
					<input class="form-control" type="number" id="formFile" name="number">
				</div>

				<div class="mb-3">
					<label for="formFile" class="form-label">Seat</label>
					<select name="seat" class="form-select" aria-label="Default select example">
						<option selected></option>
						<option value="1A">1A</option>
						<option value="1B">1B</option>
						<option value="1C">1C</option>
						<option value="2A">2A</option>
						<option value="2B">2B</option>
						<option value="2C">2C</option>
						<option value="3A">3A</option>
						<option value="3B">3B</option>
						<option value="3C">3C</option>
					</select>
				</div>
				<div class="mb-3">
					<button type="submit" class="btn btn-danger" style="margin-left:45%;">Proceed</button>
				</div>
				
			</div>
			
		</div>
		</form>
	</div>
	@endforeach
	
	<br>
	<br>

<section class="bg-navy">
		<div class="container p-5">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 text-center mb-4">
					<p class="mb-3">Follow us on</p>
					<i class="fab fa-twitter txt-30 mr-3 ml-3"></i>
					<i class="fab fa-instagram txt-30 mr-3 ml-3"></i>
					<i class="fab fa-discord txt-30 mr-3 ml-3"></i>
				</div>
				<div class="col-md-10 text-center mb-4 text-underlineambers">
					<h6 class="mb-4">Copyright © DTRAIN.CJ</h6>
					<!--
					<img src="images/avatar.png" class="rounded-circle mr-1 ml-1" width="40">
					<img src="images/avatar.png" class="rounded-circle mr-1 ml-1" width="40">
					<img src="images/avatar.png" class="rounded-circle mr-1 ml-1" width="40">
					<img src="images/avatar.png" class="rounded-circle mr-1 ml-1" width="40">
				  -->
				</div>
			</div>
		</div>
	</section>



</body>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
</html>
