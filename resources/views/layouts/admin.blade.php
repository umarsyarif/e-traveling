<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Travel | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('cropped-LOGO-AET-INDONESIA-FOR-WEB-01-192x192.png') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\bower_components\bootstrap\css\bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\icon\themify-icons\themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\icon\icofont\css\icofont.css') }}">
    <!-- Notification.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\pages\notification\notification.css') }}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\icon\feather\css\feather.css') }}">
    <!-- Datatable buttons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\bower_components\datatables.net-buttons\css\buttons.dataTables.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\css\style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminty\assets\css\jquery.mCustomScrollbar.css') }}">
    @stack('styles')
</head>
<!-- Menu sidebar static layout -->

<body>
    @include('layouts.partials.preloader')
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('layouts.partials.navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('layouts.partials.sidebar')

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
    <script type="text/javascript" src="{{ asset('adminty\bower_components\jquery\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\jquery-ui\js\jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\bootstrap\js\bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('adminty\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('adminty\bower_components\modernizr\js\modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\modernizr\js\css-scrollbars.js') }}"></script>
    <!-- notification js -->
    <script type="text/javascript" src="{{ asset('adminty\assets\js\bootstrap-growl.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\assets\pages\notification\notification.js') }}"></script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('adminty\bower_components\i18next\js\i18next.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('adminty\bower_components\jquery-i18next\js\jquery-i18next.min.js') }}"></script>
    <script src="{{ asset('adminty\assets\js\pcoded.min.js') }}"></script>
    <script src="{{ asset('adminty\assets\js\vartical-layout.min.js') }}"></script>
    <script src="{{ asset('adminty\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('adminty\assets\js\script.js') }}"></script>
    @stack('scripts')
</body>

</html>
