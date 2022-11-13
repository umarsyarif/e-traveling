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

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

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
                        <div class="col-md-6 col-sm-6 hidden-xs">
                            <ul id="top_links">
                                <li><a href="#0" id="wishlist_link">Wishlist</a>
                                </li>
                                <li><a href="#0">PURCHASE THIS TEMPLATE</a>
                                </li>
                            </ul>
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
                            <h1><a href="index.html" title="City tours travel template">BesTours Travel&amp;Excursion
                                    Multipurpose Template</a></h1>
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
                                    <a href="javascript:void(0);" class="show-submenu">Home</a>
                                    <ul>
                                        <li><a href="index.html">Home Video background</a>
                                        </li>
                                        <li><a href="index_2.html">Home Layer Slider</a>
                                        </li>
                                        <li><a href="index_3.html">Home Full Header</a>
                                        </li>
                                        <li><a href="index_4.html">Home Popup</a>
                                        </li>
                                        <li><a href="index_5.html">Home Cookie bar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Tours</a>
                                    <ul>
                                        <li><a href="grid.html">Grid view</a>
                                        </li>
                                        <li><a href="list.html">List view</a>
                                        </li>
                                        <li><a href="detail-page.html">Tour Detail</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About us</a>
                                </li>
                                <li><a href="faq.html">Faq</a>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Other pages</a>
                                    <ul>
                                        <li><a href="index_3.html">Header Version 2</a>
                                        </li>
                                        <li><a href="blog.html">Blog</a>
                                        </li>
                                        <li><a href="blog_post.html">Blog post</a>
                                        </li>
                                        <li><a href="gallery.html">Gallery</a>
                                        </li>
                                        <li><a href="maintenance.html">Mantainance</a>
                                        </li>
                                        <li><a href="profile.html">Team Profile</a>
                                        </li>
                                        <li><a href="contacts_2.html">Contact 2</a>
                                        </li>
                                        <li><a href="coming_soon/index.html">Coming soon</a>
                                        </li>
                                        <li><a href="shortcodes.html">Shortcodes</a>
                                        </li>
                                        <li><a href="icon_pack_1.html">Icon pack 1</a>
                                        </li>
                                        <li><a href="icon_pack_2.html">Icon pack 2</a>
                                        </li>
                                        <li><a href="icon_pack_3.html">Icon pack 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contacts.html">Contact us</a>
                                </li>
                                @guest
                                    <li>
                                        <a href="#" class="login-button">Login</a>
                                    </li>
                                @endguest
                                @auth
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="logout-button">Logout</button>
                                        </form>
                                    </li>
                                @endauth
                                <li class="megamenu submenu">
                                    <a href="javascript:void(0);" class="show-submenu-mega">More demos</a>
                                    <div class="menu-wrapper">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h3>Museum Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img
                                                            src="{{ asset('main/img/menu-demo-1.jpg') }}"
                                                            width="400" height="226" alt=""
                                                            class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Adventure Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img
                                                            src="{{ asset('main/img/menu-demo-2.jpg') }}"
                                                            width="400" height="226" alt=""
                                                            class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>Travel Tours</h3>
                                                <div class="menu-item">
                                                    <a href="#"><img
                                                            src="{{ asset('main/img/menu-demo-3.jpg') }}"
                                                            width="400" height="226" alt=""
                                                            class="img-responsive">
                                                    </a>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, et cum civibus referrentur, at
                                                        propriae forensibus qui. Duo aliquip necessitatibus ne.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hidden-xs">
                                        <p class="text-center hidden-xs">
                                            <a href="#" class="btn_outline">MORE DEMOS SOON</a>
                                    </div>
                                    <!-- End menu-wrapper -->
                                </li>
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
                <div class="col-md-3 col-sm-3">
                    <h3>Need help?</h3>
                    <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                    <a href="mailto:help@citytours.com" id="email_footer">help@bestours.com</a>
                </div>
                <div class="col-md-2 col-sm-3">
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
                <div class="col-md-4 col-sm-6">
                    <h3>Twitter feed</h3>
                    {{-- <div class="latest-tweets" data-number="10" data-username="mrlowlander" data-mode="fade"
                        data-pager="false" data-nextselector=".tweets-next" data-prevselector=".tweets-prev"
                        data-adaptiveheight="true">
                        <!-- data-username="your twitter username" -->
                    </div> --}}
                    <div class="tweet-control">
                        <div class="tweets-prev"></div>
                        <div class="tweets-next"></div>
                    </div>
                    <!-- End .tweet-control -->
                </div>
                <div class="col-md-3 col-sm-12">
                    <h3>Newsletter</h3>
                    <div id="message-newsletter_2">
                    </div>
                    <form method="post" action="{{ asset('main/assets/newsletter.php') }}" name="newsletter_2"
                        id="newsletter_2">
                        <div class="form-group">
                            <input name="email_newsletter_2" id="email_newsletter_2" type="email" value=""
                                placeholder="Your email" class="form-control">
                        </div>
                        <input type="submit" value="Subscribe" class="btn_1" id="submit-newsletter_2">
                    </form>
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
                <div class="box_style_2" style="border: 2px none red;
					padding: 25px;
					border-radius: 5px;">
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
                                placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn_full" id="login">
                        </div>

                    </form>
                    <a class="forgot-password-button">Lupa password?</a>
                    <hr>
                    <p class="pb-2"><strong>Belum memiliki akun?</strong></p>
                    <button class="btn_outline register-button"> Daftar</button>

                </div>
            </div>
        </div>
        {{-- End Login Modal --}}

        {{-- Register Modal --}}
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
            aria-hidden="true" style="padding-top: 10rem">
            <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
                <div class="box_style_2" style="border: 2px none red;
					padding: 25px;
					border-radius: 5px;">
                    <form method="post" id="check_avail" autocomplete="off">
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
                            <button type="submit" class="btn_full" id="login">Login</button>
                        </div>

                    </form>
                    <hr>
                    <p class="pb-2"><strong>Sudah memiliki akun?</strong></p>
                    <button class="btn_outline login-button"> Login</button>

                </div>
            </div>
        </div>
        {{-- End Register Modal --}}
        {{-- Forgot Password Modal --}}
        <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog"
            aria-labelledby="forgotPasswordModalLabel" aria-hidden="true" style="padding-top: 10rem">
            <div class="modal-dialog-centered modal-dialog" style="width: 400px;" role="document">
                <div class="box_style_2" style="border: 2px none red;
					   padding: 25px;
					   border-radius: 5px;">
                    <div id="message-booking"></div>
                    <form method="post" id="check_avail" autocomplete="off">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn_full" id="login">
                        </div>

                    </form>
                    <hr>
                    <button class="btn_outline login-button"> Login</button>

                </div>
            </div>
        </div>
        {{-- End Forgot Password Modal --}}
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
        </script>
    @endguest

</body>

</html>
