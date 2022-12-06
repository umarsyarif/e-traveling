<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="BESTOURS - Travel and Tours multipurpose template">
    <meta name="author" content="Ansonika">
    <title>BESTOURS - Travel and Tours multipurpose template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('main/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon"
        href="{{ asset('main/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="{{ asset('main/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('main/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('main/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Satisfy" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('main/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('main/css/icon_fonts/css/all_icons.min.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('main/css/custom.css') }}" rel="stylesheet">

    <!-- Modernizr -->
    <script src="{{ asset('main/js/modernizr.js') }}"></script>
    @yield('import-css')
    @yield('custom-css')

</head>

<body>

    <!--[if lte IE 8]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
    <![endif]-->

    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->
    @yield('content')
    <!-- Header================================================== -->
    <div id="header_1">
        <header>
            <div id="top_line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a href="tel://004542344599" id="phone_top">0045 043204434</a><span id="opening">Mon - Sat
                                8.00/18.00</span>
                        </div>
                    </div>
                    <!-- End row -->
                </div>
                <!-- End container-->
            </div>
            <!-- End top line-->

            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div id="logo_home">
                            <h1><a href="{{ route('home') }}" title="City tours travel template">BesTours
                                    Travel&amp;Tour</a></h1>
                        </div>
                    </div>
                    <nav class="col-md-9 col-sm-9 col-xs-9">
                        <ul id="tools_top">
                            <li><a href="#" class="search-overlay-menu-btn"><i class="icon-search-6"></i></a>
                            </li>
                        </ul>
                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close"
                            href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img src="{{ asset('main/img/logo_menu.png') }}" width="145" height="34"
                                    alt="Bestours">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                            <ul>
                                <li class="submenu">
                                    <a href="{{ route('travel.list') }}" class="show-submenu">Wisata</a>
                                </li>
                                @auth
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai')
                                        <li>
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                    @else
                                        <li class="submenu">
                                            <a href="{{ route('order.history') }}" class="show-submenu">Riwayat Order</a>
                                        </li>
                                    @endif
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="logout-button">Logout</button>
                                        </form>
                                    </li>
                                @endauth
                                @guest
                                    <li>
                                        <a href="javascript:void(0)" class="login-button">Login</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                        <!-- End main-menu -->
                    </nav>
                </div>
            </div>
            <!-- container -->
        </header>
        <!-- End Header -->
    </div>
    <!-- End Header 1-->



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <img src="{{ asset('main/img/logo_menu.png') }}" width="145" height="34" alt="Bestours">
                    <p class="mt-3">BesTours adalah agen perjalanan yang melayani perjalanan
                        individu serta grup. Dengan paket liburan terlengkap dan hemat.
                        BesTours menawarkan liburan yang nyaman dan berbeda bagi pelanggannya. </p>

                </div>
                <div class="col-md-4 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@bestours.com</a>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">About us</a>
                        </li>
                        <li><a href="#">FAQ</a>
                        </li>
                        <li><a href="#">Login</a>
                        </li>
                        <li><a href="#">Register</a>
                        </li>
                        <li><a href="#">Terms and condition</a>
                        </li>
                    </ul>
                </div>


            </div>
            <!-- End row -->
            <hr>
            <div class="row">
                <div class="col-sm-8">
                    <div class="styled-select">
                        <select class="form-control" name="lang" id="lang">
                            <option value="English" selected>English</option>
                            <option value="French">French</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Russian">Russian</option>
                        </select>
                    </div>
                    <span id="copy">© BestTours 2021 - All rights reserved</span>
                </div>
                <div class="col-sm-4" id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-google"></i></a>
                        </li>
                        <li><a href="#"><i class="icon-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </footer>
    <!-- End footer -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    <!-- Search Menu -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><i class="icon_close"></i></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon-search-6"></i>
            </button>
        </form>
    </div>
    <!-- End Search Menu -->

    @guest
        {{-- Login Modal --}}
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true" style="padding-top: 10rem">
            <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
                <div class="box_style_2 pb-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="type" value="login">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_full" id="login">
                                Login
                            </button>
                        </div>

                    </form>
                    <a class="forgot-password-button" style="cursor: pointer;">Lupa password?</a>
                    <hr>
                    <p><strong>Belum memiliki akun?</strong></p>
                    <button class="btn_outline register-button"> DAFTAR</button>
                </div>
            </div>
        </div>
        {{-- End Login Modal --}}

        {{-- Register Modal --}}
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
            aria-hidden="true" style="padding-top: 10rem; height: 600px;">
            <div class="modal-dialog-centered modal-dialog custom-scrollbar"
                style="width: 400px; height :100% !important;
            overflow-y:auto !important;" role="document">
                <div class="box_style_2 pb-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="type" value="register">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                placeholder="Telepon">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_full" id="login">Daftar</button>
                        </div>

                    </form>
                    <hr>
                    <p class="pb-2"><strong>Sudah memiliki akun?</strong></p>
                    <button class="btn_outline login-button"> LOGIN</button>

                </div>
            </div>
        </div>
        {{-- End Register Modal --}}

        {{-- Forgot Password Modal --}}
        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
            aria-labelledby="forgotPasswordModalLabel" aria-hidden="true" style="padding-top: 10rem">
            <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
                <div class="box_style_2 pb-5">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    @if (session()->has('forgot-password-email-success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <p>{{ session()->get('forgot-password-email-success') }}</p>
                        </div>
                    @endif
                    <form method="post" action="{{ route('password.email') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="type" value="forgot-password">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn_full" id="login">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Forgot Password Modal --}}

        {{-- Reset Password Modal --}}
        @isset($token)
            <div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog"
                aria-labelledby="resetPasswordModalLabel" aria-hidden="true" style="padding-top: 10rem">
                <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
                    <div class="box_style_2 pb-5">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}" autocomplete="off">
                            @csrf
                            <input type="hidden" name="type" value="reset-password">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Konfirmasi Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn_full" id="login">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- End Reset Password Modal --}}
        @endisset
    @endguest


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('main/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('main/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('main/assets/validate.js') }}"></script>
    <script src="{{ asset('main/js/jquery.tweet.min.js') }}"></script>
    <script src="{{ asset('main/js/functions.js') }}"></script>
    <script src="{{ asset('main/js/custom.js') }}"></script>

    @yield('import-js')
    @yield('custom-js')

    @guest

        <script>
            $(".login-button").click(function() {
                let isShown = ($("#loginModal").data('bs.modal') || {}).isShown;
                if (isShown) {
                    $('#loginModal').modal('hide');
                } else {
                    $('#loginModal').modal('show');
                    $('#registerModal').modal('hide');
                    $('#forgotPasswordModal').modal('hide');
                }
            });

            $(".register-button").click(function() {
                $('#loginModal').modal('hide');
                $('#registerModal').modal('show');
                $('#forgotPasswordModal').modal('hide');
            });

            $(".forgot-password-button").click(function() {
                $('#loginModal').modal('hide');
                $('#registerModal').modal('hide');
                $('#forgotPasswordModal').modal('show');
            });

            @if ($errors->any())
                let type = '{{ old('type') }}';

                if (type == 'login') {
                    $(function() {
                        $('#loginModal').modal('show');
                    });
                }
                if (type == 'register') {
                    $(function() {
                        $('#registerModal').modal('show');
                    });
                }
                if (type == 'forgot-password') {
                    $(function() {
                        $('#forgotPasswordModal').modal('show');
                    });
                }
            @endif
            @if (session()->has('forgot-password-email-success'))
                $(function() {
                    $('#forgotPasswordModal').modal('show');
                });
            @endif
            @isset($token)
                $(function() {
                    $('#resetPasswordModal').modal('show');
                });
            @endisset
            @if (request()->get('token'))
                console.log('tes');
                $(function() {
                    alert('tes');
                });
            @endif
        </script>
    @endguest

</body>

</html>
