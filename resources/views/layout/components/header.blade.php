<header class="main_header_area">
    <div class="header-content">
        <div class="container">
            <div class="links links-left">
                <ul>
                    <li><a href="#"><i class="fa fa-phone"></i>{{pref('display_telp')}}</a></li>
                    <li><a href="#"><i class="fa fa-envelope-open"></i> {{pref('email')}}</a></li>
                </ul>
            </div>
            <div class="links links-right pull-right">
                <ul>
                    <li>
                        <ul class="social-links">
                            <li><a href="{{ route('switch.language') }}" class="btn-language">
                                    {{ app()->getLocale() === 'id' ? 'EN' : 'ID' }}
                                </a>
                            </li>
                            <li><a href="{{pref('facebook')}}"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="{{pref('instagram')}}"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-sign-in"></i> Login</a>
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
                                        <h3 class="white">{{ __('common.menu_home.title_section') }}</h3>
                                        <p class="white">{{ __('common.menu_home.tag_content') }}</p>
                                    </div>

                                    <div class="contact-info">
                                        <h4 class="white">Contact Info</h4>
                                        <ul>
                                            <li><i class="fa fa-map-marker-alt"></i> {{pref('alamat')}}
                                            </li>
                                            <li><i class="fa fa-phone-alt"></i>{{pref('display_telp')}}</li>
                                            <li><i class="fa fa-envelope-open"></i>{{pref('email')}}</li>
                                            <li><i class="fa fa-clock"></i> Week Days: 09.00 to 18.00
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
                                <a href="{{url('/')}}" class="dropdown-toggle">Home</a>
                            </li>
                            <li class="submenu dropdown">
                                <a href="{{route('bromo', app()->getLocale())}}" class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button" aria-haspopup="true" aria-expanded="false">{{ __('common.menu_trip') }}
                                    <i
                                        class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                    @foreach(\App\Models\Master\Tour::query()->where('status_tour','I')->get() as $item)
                                        <li>
                                            <a href="{{route('trip', ['slug'=>$item->slug_tour, 'locale' =>  app()->getLocale()])}}">{{$item->nama_tour}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('rental', app()->getLocale())}}"
                                   class="dropdown-toggle">{{ __('common.menu_rental') }} </a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('gallery', app()->getLocale())}}"
                                   class="dropdown-toggle">{{ __('common.menu_galleri') }}  </a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('about', app()->getLocale())}}"
                                   class="dropdown-toggle">{{ __('common.menu_about') }}</a>
                            </li>
                            <li class="dropdown submenu">
                                <a href="{{route('contact', app()->getLocale())}}"
                                   class="dropdown-toggle">{{ __('common.menu_contact') }}</a>
                            </li>

                            <li class="dropdown submenu" >
                                <a href="{{ route('switch.language') }}"
                                   class="lang-switch"
                                   title="{{ app()->getLocale() === 'id' ? 'Switch to English' : 'Ganti ke Bahasa Indonesia' }}">

                                    @if(app()->getLocale() === 'id')
                                        <img src="{{ asset('front/flags/en.svg') }}" alt="English">
                                        <span>EN</span>
                                    @else
                                        <img src="{{ asset('front/flags/id.svg') }}" alt="Indonesia">
                                        <span>ID</span>
                                    @endif
                                </a>
                            <li class="dropdown submenu">

                            <li class="dropdown submenu">
                                <a href="javascript:void()" class="dropdown-toggle" data-toggle="modal"
                                   data-target="#login">Login</a>
                            </li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div id="slicknav-mobile"></div>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <!-- Navigation Bar Ends -->
</header>
