<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Landing Page</title>

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
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" height="40"></a>
			</div>
		</div>
	</nav>


<section>
  <div class="container mb-5">
    <div class="row d-flex justify-content-center mb-5">
      <div class="col-md-10 p-5">
        <div class="card cardborder-none shadow">
          <div class="card-header cardborder-none">
            Where to?
          </div>
          <div class="card-body">
            <form>
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-md-5">
                <label for="origin">Origin</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-subway"></i></div>
                  </div>
                  <input type="text" class="form-control" id="origin">
                </div>
              </div>
              <div class="form-group col-md-1 text-center align-self-end">
                <button class="btn bg-navy"><i class="fas fa-exchange-alt"></i></button>
              </div>
              <div class="form-group col-md-5">
                <label for="destination">Destination</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-subway"></i></div>
                  </div>
                  <input type="text" class="form-control" id="destination">
                </div>
              </div>
            </div>
            <div class="form-row d-flex justify-content-center">
              <div class="form-group col-md-2">
                <label for="origin">Departure</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="origin">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-2">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Return</label>
              </div>
                <div class="input-group">
                  <input type="text" class="form-control" id="return">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-2">
                <label for="adult">Adult</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="adult">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                  </div>
                </div>
                <small class="form-text text-muted">Age 4+</small>
              </div>
              <div class="form-group col-md-2">
                <label for="infant">Infant</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="infant">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                </div>
                <small class="form-text text-muted">Below Age 4</small>
              </div>
              <div class="form-group col-md-3 text-center align-self-center">
                <button class="btn bg-amber btn-block">Search Ticket</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
