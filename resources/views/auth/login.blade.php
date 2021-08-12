<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - {{ env('APP_NAME') }}</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{url('assets/auth/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{url('assets/auth/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/auth/css/skin_color.css')}}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .form-control{
            height: 45px;
        }
    </style>

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url({{image_url('bg.jpg')}})" data-overlay="2">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="bg-white rounded shadow-lg">
                        <div class="content-top-agile p-20 pb-0">
                            <h2 class="text-primary">Let's Get Started</h2>
                            <p class="mb-0">Sign in to continue to {{ env('APP_NAME') }}.</p>
                        </div>


                        <div class="p-40">
                            @include('flash')
                            <form action="{{route('login.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input type="email" name="email_address" required class="form-control pl-15 bg-transparent" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" required class="form-control pl-15 bg-transparent" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-block mt-10">SIGN IN</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script src="{{url('assets/auth/js/vendors.min.js')}}"></script>
</body>
</html>
