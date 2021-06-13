<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>DTRAIN.CJ | Data Booking</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

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
			<a class="navbar-brand" href="{{url('/dashboard')}}"><img src="images/logo.png" alt="logo" height="40"></a>

			<form class="form-inline my-2 my-lg-0 ml-auto">
				<a href="{{route('logout')}}" class="btn bg-navy my-2 my-sm-0 widht-btn1">Logout</a>
			</form>
		</div>
		</div>
	</nav>

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="images/header.png" alt="First slide">
	    </div>
	  </div>
	</div>

	<section>
                  
		<div class="container mb-5">
			<div class="row d-flex justify-content-center mb-5">
				<div class="col-md-10 p-5">
					<div class="card cardborder-none shadow">
					    <div class="card-header cardborder-none">
					    Data Booking
					    </div>
                      
                      
                        <div class="card-body">
                            <table class="table mt-5 table-bordered">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th scope="col">Nama Kereta</th>
                                        <th scope="col">Stasiun Asal</th>
                                        <th scope="col">Stasiun Tujuan</th>
                                        <th scope="col">Jadwal</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Gerbong</th>
                                        <th scope="col">Jam Keberangkatan</th>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($dataBook as $db)
                                        <tr class="data-row">
                                            <td>{{$db->nama_kereta}}</td>
                                            <td>{{$db->stasiun_asal}}</td>
                                            <td>{{$db->stasiun_tujuan}}</td>
                                            <td>{{$db->jadwal}}</td>
                                            <td>{{$db->kelas}}</td>
                                            <td>{{$db->gerbong}}</td>
                                            <td>{{$db->jam_keberangkatan}}</td>
                                        </tr>
									@endforeach
                                </tbody>
                            </table>
					    </div>

					</div>
				</div>
			</div>
			<hr>
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 text-center p-5 text-underlineambers">
					<h2 class="mb-3">Who are we</h2>
					<p>The latest train ticket booking website that is lightweight, more user-friendly, and always up to date to make it easier for you to book your train ticket </p>
				</div>
			</div>
			<div class="row d-flex justify-content-center mb-5 p-5 ">
				<div class="col-md-10 text-center mb-5 text-underlineambers">
					<h3>Why Choose Dtrain.CJ</h3>
				</div>
				<!-- 1 -->
				<div class="col-md-5 text-underlineambers">
					<h4 class="mb-3">Official Partner of KAI</h4>
					<p>We make sure the tickets you book are genuine and at competitive prices.</p>
				</div>
				<div class="col-md-5 text-right mb-5">
					<img src="images/Logo_PT_Kereta_Api_Indonesia.png" class="img-fluid" alt="gambar-kai">
				</div>
				<!-- 2 -->
				<div class="col-md-5 mb-5 mt-5">
					<img src="images/card1.png" class="img-fluid" alt="gambar-card">
				</div>
				<div class="col-md-5 mb-5 text-right mt-5 text-underlineambers">
					<h4 class="mb-3">Various Payment Options</h4>
					<p>With plenty of options from ATM Transfer, Mobile Banking to Credit/Debit Card.</p>
				</div>
				<!-- 3 -->
				<div class="col-md-5 mb-5 mt-5 text-underlineambers">
					<h4 class="mb-3">Book Anywere, Anytime</h4>
					<p>The availability of tickets will always be updated over time, making it easier to find the right ticket. </p>
				</div>
				<div class="col-md-5 text-right mb-5 mt-5">
					<img src="images/laptop1.png" class="img-fluid" alt="gambar-laptop">
				</div>
			</div>
		</div>
	</section>

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
