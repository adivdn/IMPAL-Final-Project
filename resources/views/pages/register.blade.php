<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('register.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <title>DTRAIN.CJ | Register</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" onclick="openNav()"> ☰
                <img src="Logo.png" alt="Logo" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    @if(session('success-message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>Berhasil buat akun</strong>
        </div>
    @endif

    <div class="gambar">
        <img src="Person.png" alt="Logo" style="width: 451px;
        height: 568px;">
    </div>
    <div class="container border border-3">
        <div class="judul">
            <b class="become">
                <p>Become a Member</p>
            </b>
            <p class="journey">Your journey with us starts now.</p>
        </div>
        <div class="form-regis">
            <form action="{{route('registeraccount')}}" method="POST">
            {{csrf_field()}}
                <div class="form-email">
                    <label for="email" class="form-label email"><b>Email</b> </label>
                    <input type="email" class="form-control" id="email" placeholder=""
                        style="width: 458px; height: 36px;" name="email">
                </div>
                <div class="form-password">
                    <label for="exampleFormControlTextarea1" class="form-label password"><b>Password</b></label>
                    <input type="password" name="password" class="form-control" style="width: 458px; height: 36px;">
                </div>

                <button type="submit" class="btn btn-danger" id="btn-proceed">Proceed</button>
            </form>
        </div>
        <div class="link-login">
            <p>Already Registered? <a href="#">Login</a> </p>
        </div>
        <hr class="garis">
        <div class="login-google-fb">
            <a href="{{route('registergoogle')}}"><button class="form-control">Register using Google</button></a>
            <button class="form-control" style="margin-top: 10px;">Register using Facebook</button>
        </div>
    </div>
    <div class="footer">
        <div class="follow">
            <p>Follow us on</p>
        </div>
        <div class="foto">
            <a href="#"><i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"
                    style="margin-right: 10px;"></i></a>
            <a href="#"><i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"
                    style="margin-left: 50px;"></i></a>
            <a href="#"><i class="fab fa-discord fa-lg white-text mr-md-5 mr-3 fa-2x"
                    style="margin-left: 50px;"></i></a>
        </div>
        <div class="garis">
            <hr class="">
        </div>
        <div class="footer-copyright text-center py-3">
            Copyright © DTRAIN.CJ
        </div>

    </div>
</body>

</html>