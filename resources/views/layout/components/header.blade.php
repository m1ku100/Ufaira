<header class="main_header_area">
    <div class="header-content">
        <div class="container">
            <div class="links links-left">
                <ul>
                    <li><a href="#"><i class="fa fa-phone-alt"></i>(+62) 822 1853 8394</a></li>
                    <li><a href="#"><i class="fa fa-envelope-open"></i> ufairatour@gmail.com</a></li>
                </ul>
            </div>
            <div class="links links-right pull-right">
                <ul>
                    <li>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in-alt"></i> Login</a>
                    </li>

                    <li>
                        <div class="header_sidemenu">
                            <div class="menu">
                                <div class="close-menu">
                                    <i class="fa fa-times white"></i>
                                </div>
                                <div class="m-contentmain">
                                    <div class="m-logo mar-bottom-30">
                                        <img src="{{asset('front/images/logo_trans.png')}}" alt="m-logo">
                                    </div>

                                    <div class="content-box mar-bottom-30">
                                        <h3 class="white">Get In Touch</h3>
                                        <p class="white">We must explain to you how all seds this mistakens idea off
                                            denouncing pleasures and praising pain was born and I will give you a
                                            completed accounts..</p>
                                        <a href="#" class="biz-btn biz-btn1">Consultation</a>
                                    </div>

                                    <div class="contact-info">
                                        <h4 class="white">Contact Info</h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker-alt"></i> Travel 26, Old Brozon Mall, Newyrok
                                                NY 10005
                                            </li>
                                            <li><i class="fa fa-phone-alt"></i>555 626-0234</li>
                                            <li><i class="fa fa-envelope-open"></i>support@travel.com</li>
                                            <li><i class="fa fa-clock"></i> Week Days: 09.00 to 18.00 Sunday: Closed
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="mhead">
                                <span class="menu-ham"><i class="fa fa-bars white"></i></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Navigation Bar -->
    <div class="header_menu affix-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-flex">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{asset('front/images/logo_trans.png')}}" alt="image" style="height: 80px">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav" id="responsive-menu">
                            <li class="dropdown  submenu active">
                                <a href="{{url('/')}}" class="dropdown-toggle" >Home</a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="{{route('bromo')}}" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">Pejalanan <i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('bromo')}}">Gunung Bromo</a></li>
                                    <li><a href="{{route('ijen')}}">Kawah Ijen</a></li>
                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('gallery')}}" class="dropdown-toggle">Galeri </a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('about')}}" class="dropdown-toggle">Tentang Kami</a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('contact')}}" class="dropdown-toggle">Kontak</a>
                            </li>

{{--                            <li class="dropdown">--}}
{{--                                <a href="#search1" class="mt_search"><i class="fa fa-search"></i></a>--}}
{{--                            </li>--}}
{{--                            <li class="dropdown">--}}
{{--                                <a href="cart.html" class="mt_cart"><i class="fa fa-shopping-cart"></i><span--}}
{{--                                        class="number-cart">1</span></a>--}}
{{--                            </li>--}}
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div id="slicknav-mobile"></div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <!-- Navigation Bar Ends -->
</header>
