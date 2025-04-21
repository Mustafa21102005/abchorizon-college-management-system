<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>ABC Horizon | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/progressbar_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/animated-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">

    <style>
        /* Ensure the dropdown menu takes full width but does not overflow */
        .dropdown-menu {
            width: auto;
            /* Allow the menu width to adjust based on content */
            min-width: 140px;
            /* Set a minimum width */
            padding: 0;
            /* Remove any unwanted padding */
        }

        /* Style the dropdown items for better fit */
        .dropdown-item {
            font-size: 16px;
            /* Adjust font size for better readability */
            text-align: left;
            /* Align text to the left for clarity */
            padding: 8px;
            /* Provide space inside each item */
            overflow: hidden;
            /* Prevent overflow of long text */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Smooth transition for hover effects */
        }

        /* Add hover effect for dropdown items */
        .dropdown-item:hover {
            color: #cc00ff;
            /* Purple text color on hover */
            cursor: pointer;
            /* Change mouse pointer to indicate clickable item */
        }
    </style>
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('theme/img/logo/loder.png') }}">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('home') }}"><img
                                            src="{{ asset('theme/img/logo/logo.png') }}"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                                <li><a href="{{ route('courses') }}">Courses</a></li>
                                                <li><a href="{{ route('program') }}">Programs</a></li>
                                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                                @if (Route::has('login'))
                                                    @auth
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="window.location.href='{{ route('profile.edit') }}'">
                                                                        Profile
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="window.location.href='{{ route('my-grades') }}'">My
                                                                        Grades</button>
                                                                </li>
                                                                <li>
                                                                    <button class="dropdown-item"
                                                                        onclick="window.location.href='{{ route('my-courses') }}'">My
                                                                        Courses</button>
                                                                </li>
                                                                <li>
                                                                    <form method="POST" action="{{ route('logout') }}">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item">Logout</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ route('login') }}">Log in</a></li>

                                                        @if (Route::has('register'))
                                                            <li><a href="{{ route('register') }}">Register</a></li>
                                                        @endif
                                                    @endauth
                                                @endif

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    @yield('content')

    <footer>
        <div class="footer-wrappper footer-bg">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-25">
                                        <a href="{{ route('home') }}"><img
                                                src="{{ asset('theme/img/logo/logo2_footer.png') }}"></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>The automated process starts as soon as your clothes go into the machine.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- social -->
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Links</h4>
                                    <ul>
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        <li><a href="{{ route('courses') }}">Courses</a></li>
                                        <li><a href="{{ route('program') }}">Programs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Certifications</h4>
                                    <ul>
                                        <li><a href="#">ISO 9001 Certified</a></li>
                                        <li><a href="#">Google Certified Partner</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contact Us</h4>
                                    <ul>
                                        <li><a href="mailto:info@example.com">support@colorlib.com</a></li>
                                        <li><a href="tel:+123456789">+1 253 565 2365</a></li>
                                        <li><a href="#">
                                                <p>Buttonwood, California.
                                                    Rosemead, CA 91770</p>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        <a href="https://wa.me/966545117570" target="_blank">Mustafa</a> &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i
                                            class="fa fa-heart" aria-hidden="true"></i> by <a
                                            href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JS here -->
    <script src="{{ asset('theme/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('theme/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('theme/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('theme/js/wow.min.js') }}"></script>
    <script src="{{ asset('theme/js/animated.headline.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('theme/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('theme/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.sticky.js') }}"></script>
    <!-- Progress -->
    <script src="{{ asset('theme/js/jquery.barfiller.js') }}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{ asset('theme/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('theme/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('theme/js/hover-direction-snake.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('theme/js/contact.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.form.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('theme/js/mail-script.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('theme/js/plugins.js') }}"></script>
    <script src="{{ asset('theme/js/main.js') }}"></script>

    @yield('js')

</body>

</html>
