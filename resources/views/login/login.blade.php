<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V12</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    @include("helpers.error_loop")
    <div class="container-login100" style="background-image: url('{{asset('login/images/help.png')}}');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" >
                @csrf
                <div class="mx-auto">
                    <img src="{{asset('login/images/hayman.small.png')}}" alt="HAYMAN" style="width:150px">
                </div>

                <span class="login100-form-title p-t-20 p-b-45">
						HELP DESK
					</span>

                <div class="wrap-input100 validate-input m-b-10" data-validate="name is required">
                    <input class="input100" type="text" name="name" placeholder="User Name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="{{asset('login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('login/js/main.js')}}"></script>
</body>
</html>
