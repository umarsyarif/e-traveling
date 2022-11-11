<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Travel | @yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('adminty\assets\images\favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\icon\feather\css\feather.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\css\style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\css\jquery.mCustomScrollbar.css')}}">
</head>
<!-- Menu sidebar static layout -->

<body>
    @include('layout.partials.preloader')
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layout.partials.navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('layout.partials.sidebar')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('adminty/bower_components\jquery\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty/bower_components\jquery-ui\js\jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty/bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty/bower_components\bootstrap\js\bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('adminty/bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('adminty/assets\js\pcoded.min.js') }}"></script>
    <script src="{{ asset('adminty/assets\js\vartical-layout.min.js') }}"></script>
    <script src="{{ asset('adminty/assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty/assets\pages\dashboard\crm-dashboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty/assets\js\script.js') }}"></script>
</body>

</html>
