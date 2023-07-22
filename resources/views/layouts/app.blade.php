<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | ORNOTSHOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="{{ URL::to('/') }}/favicon.png" type="image/x-icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

    <div class="limiter">
	     @yield('contend')
	</div>

	<script src="{{ URL::to('') }}/vendor/jquery/jquery-3.2.1.min.js"></script>

        <script src="{{ URL::to('') }}/vendor/bootstrap/js/popper.js"></script>
        <script src="{{ URL::to('') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{ URL::to('') }}/vendor/select2/select2.min.js"></script>
        <script src="{{ URL::to('') }}/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <script src="{{ URL::to('') }}/js/main.js"></script>
</body>
</html>
