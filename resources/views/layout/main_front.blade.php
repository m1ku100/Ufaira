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
@include('layout.components.footer')
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
                @if(session()->has('message'))
                    <p class="alert alert-danger">
                        {{ session('message') }}
                    </p>
                @endif
                <form method="post" id="form_login" action="{{route('auth.login')}}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter email address">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter password">
                    </div>
                </form>

                <button type="submit" class="btn btn-primary btn-submit">LOGIN</button>

            </div>
            <div class="login-social section-border" style="display: none">
                <p>or continue with</p>
                <a href="#" class="btn-facebook"><i class="fab fa-facebook" aria-hidden="true"></i> Facebook</a>
                <a href="#" class="btn-twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Twitter</a>
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

<script>
    $(function () {
        $(".btn-submit").on("click", function (e) {
            e.preventDefault(); // cancel default action

            document.getElementById("form_login").submit(); // or $("#form_id")[0].submit();

        });



    })


    function openWa(){
        console.log('Test')
        var link = `https://wa.me/{{pref('telp')}}`+ `?text=Hallo Selamat Siang`;

        var isSafari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 &&
            navigator.userAgent &&
            navigator.userAgent.indexOf('CriOS') == -1 &&
            navigator.userAgent.indexOf('FxiOS') == -1;

        if(isSafari){
            window.location.assign(link) // Safari
        }else{
            window.open(link)// Chrome
        }
    }

</script>


@stack('js')

</body>
</html>
