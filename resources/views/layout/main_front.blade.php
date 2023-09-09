<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front/images/favicon.ico')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/color/color_scheme.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!--Default CSS-->
    <link href="{{asset('front/css/default.css')}}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css">
    <!--Color Switcher CSS-->
    <link rel="stylesheet" href="{{asset('front/css/color/color-default.css')}}">
    <!--Plugin CSS-->
    <link href="{{asset('front/css/plugin.css')}}" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="{{asset('front/fonts/flaticon.css')}}" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <style>
        /* Hilangkan Color palete Switcher */
        .hilang {
            display: none;
        }
    </style>
    @yield('meta')
</head>
<body>

<!-- Preloader -->
{{--<div id="preloader">--}}
{{--    <div id="status"></div>--}}
{{--</div>--}}
<!-- Preloader Ends -->

<!-- header starts -->
@include('layout.components.header')
<!-- header ends -->

@yield('content')

<!-- footer starts -->
<footer>
    <div class="footer-upper pad-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-about">
                        <div class="footer-about-in mar-bottom-30">
                            <h3 class="white">Hubungi Kami</h3>
                            <div class="footer-phone">
                                <div class="cont-icon"><i class="flaticon-call"></i></div>
                                <div class="cont-content mar-left-20">
                                    <p class="mar-0">Kami Menyediakan kebutuhan travel kamu!</p>
                                    <p class="bold mar-0"><span>Telpon :</span> (+62) 822 1853 8394</p>
                                </div>
                            </div>
                        </div>
                        <h3 class="white">Contact Info</h3>
                        <p>PO Box: +47-252-254-2542<br>
                            Location: Collins Stree, Vicotria 80, Australia</p>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-links">
                        <h3 class="white">Company</h3>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Statement</a></li>
                            <li><a href="#">Feedbacks</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="footer-links">
                        <h3 class="white">Support</h3>
                        <ul>
                            <li><a href="#">Account</a></li>
                            <li><a href="#">Legal</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="footer-subscribe">
                        <h3 class="white">Mailing List</h3>
                        <p class="white">Sign up for our mailing list to get latest updates and offers</p>
                        <form>
                            <input type="email" placeholder="Your Email">
                            <a href="#" class="biz-btn mar-top-15">Subscribe</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="copyright-text pull-left">
                <p class="mar-0">{{date('Y')}} All rights reserved.</p>
            </div>
            <div class="footer-nav pull-right">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- footer ends -->

<!-- Back to top start -->
<div id="back-to-top">
    <a href="#"></a>
</div>
<!-- Back to top ends -->

<!-- search popup -->
<div id="search1">
    <button type="button" class="close">×</button>
    <form>
        <input type="search" value="" placeholder="type keyword(s) here"/>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
        <div class="login-content">
            <div class="login-title section-border">
                <h3>Login</h3>
            </div>
            <div class="login-form section-border">
                <form>
                    <div class="form-group">
                        <input type="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Enter password">
                    </div>
                </form>
                <div class="form-btn">
                    <a href="#" class="biz-btn biz-btn1">LOGIN</a>
                </div>
                <div class="form-group form-checkbox">
                    <input type="checkbox"> Remember Me
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="login-social section-border">
                <p>or continue with</p>
                <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
            </div>
            <div class="sign-up">
                <p>Do not have an account?<a href="#">Sign Up</a></p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
</div>

<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
        <div class="login-content">
            <div class="login-title section-border">
                <h3>Register</h3>
            </div>
            <div class="login-form section-border">
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="User Name">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password">
                    </div>
                </form>
                <div class="form-btn">
                    <a href="#" class="biz-btn biz-btn1">REGISTER</a>
                </div>
                <div class="form-group form-checkbox">
                    <input type="checkbox"> Remember Me
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="login-social section-border">
                <p>or continue with</p>
                <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
            </div>
            <div class="sign-up">
                <p>Do not have an account?<a href="#">Sign Up</a></p>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
</div>

<!-- *Scripts* -->
<script src="{{asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/color-switcher.js')}}"></script>
<script src="{{asset('front/js/plugin.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script src="{{asset('front/js/menu.js')}}"></script>
<script src="{{asset('front/js/custom-swiper2.js')}}"></script>
<script src="{{asset('front/js/custom-nav.js')}}"></script>
<script src="{{asset('front/js/custom-date.js')}}"></script>

@stack('js')

</body>
</html>
