<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{url('assets/libs/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/slick.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/lightgallery.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/animate.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/jQueryUi.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/textRotate.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{url('assets/libs/css/style.css')}}" />
</head>
<body>

<div class="st-perloader">
    <div class="st-perloader-in">
        <div class="st-wave-first">
            <svg   enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08" xmlns="http://www.w3.org/2000/svg"><g><path d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" /></g></svg>
        </div>
        <div class="st-wave-second">
            <svg   enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08" xmlns="http://www.w3.org/2000/svg"><g><path d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z" /></g></svg>
        </div>
    </div>
</div>

<!-- Start Header Section -->
<header class="st-site-header st-style1 st-type1">
    <div class="st-top-header">
        <div class="container">
            <div class="st-top-header-in">
                <a class="st-site-branding" href="{{url('/')}}"><img src="{{image_url('logo.png')}}" style="width: 50px; height: 50px;" alt="{{env('APP_NAME')}}"></a>
                <ul class="st-top-header-list">
                    <li>
                        <svg   enable-background="new 0 0 479.058 479.058" viewBox="0 0 479.058 479.058" xmlns="http://www.w3.org/2000/svg"><path d="m434.146 59.882h-389.234c-24.766 0-44.912 20.146-44.912 44.912v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159l-200.355 173.649-200.356-173.649c1.769-.736 3.704-1.159 5.738-1.159zm0 299.411h-389.234c-8.26 0-14.971-6.71-14.971-14.971v-251.648l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"/></svg>
                        <a href="#">support@fpemedical.com</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="st-main-header">
        <div class="container">
            <div class="st-main-header-in">
                <div class="st-main-header-left">
                    <div class="st-nav">
                        <ul class="st-nav-list">
                            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="{{url('about')}}">About Developer</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section -->

@yield('content')

<!-- Start Footer -->
<footer class="st-site-footer st-sticky-footer st-dynamic-bg" data-src="assets/img/footer-bg.png">
    <div class="st-main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <div class="st-text-field">
                            <img src="{{image_url('logo.png')}}" style="width: 50px; height: 50px;" alt="{{env('APP_NAME')}}" class="st-footer-logo">
                            <div class="st-height-b25 st-height-lg-b25"></div>
                            <div class="st-height-b25 st-height-lg-b25"></div>
                            <ul class="st-social-btn st-style1 st-mp0">
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Useful Links</h2>
                        <ul class="st-footer-widget-nav st-mp0">
                            <li><a href="#"><i class="fas fa-chevron-right"></i>FAQs</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Blog</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Weekly timetable</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Departments</h2>
                        <ul class="st-footer-widget-nav st-mp0">
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Rehabilitation</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Laboratory Analysis</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Face Lift Surgery</a></li>
                            <li><a href="#"><i class="fas fa-chevron-right"></i>Liposuction</a></li>
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="col-lg-3">
                    <div class="st-footer-widget">
                        <h2 class="st-footer-widget-title">Contacts</h2>
                        <ul class="st-footer-contact-list st-mp0">
                            <li><span class="st-footer-contact-title">Email:</span> support@fpemedical.com</li>
                        </ul>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
    <div class="st-copyright-wrap">
        <div class="container">
            <div class="st-copyright-in">
                <div class="st-left-copyright">
                    <div class="st-copyright-text">Copyright 2021. {{ env('APP_NAME') }}</div>
                </div>
                <div class="st-right-copyright">
                    <div id="st-backtotop"><i class="fas fa-angle-up"></i></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- Start Video Popup -->
<div class="st-video-popup">
    <div class="st-video-popup-overlay"></div>
    <div class="st-video-popup-content">
        <div class="st-video-popup-layer"></div>
        <div class="st-video-popup-container">
            <div class="st-video-popup-align">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="about:blank"></iframe>
                </div>
            </div>
            <div class="st-video-popup-close"></div>
        </div>
    </div>
</div>
<!-- End Video Popup -->



<!-- Scripts -->
<script src="{{url('assets/libs/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{url('assets/libs/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{url('assets/libs/js/isotope.pkg.min.js')}}"></script>
<script src="{{url('assets/libs/js/jquery.slick.min.js')}}"></script>
<script src="{{url('assets/libs/js/mailchimp.min.js')}}"></script>
<script src="{{url('assets/libs/js/counter.min.js')}}"></script>
<script src="{{url('assets/libs/js/lightgallery.min.js')}}"></script>
<script src="{{url('assets/libs/js/ripples.min.js')}}"></script>
<script src="{{url('assets/libs/js/wow.min.js')}}"></script>
<script src="{{url('assets/libs/js/jQueryUi.js')}}"></script>
<script src="{{url('assets/libs/js/textRotate.min.js')}}"></script>
<script src="{{url('assets/libs/js/select2.min.js')}}"></script>
<script src="{{url('assets/libs/js/main.js')}}"></script>
</body>
</html>
