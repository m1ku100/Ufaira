<footer>
    <div class="footer-upper pad-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-about">
                        <div class="footer-about-in mar-bottom-30">
                            <h3 class="white">{{ __('common.menu_home.contact_us') }}</h3>
                            <div class="footer-phone">
                                <div class="cont-icon"><i class="flaticon-call"></i></div>
                                <div class="cont-content mar-left-20">
                                    <p class="mar-0">{{ __('common.menu_home.footer_title') }}</p>
                                    <p class="bold mar-0"><span>{{ __('common.menu_home.contact') }} : {{pref('display_telp')}} </span> </p>
                                </div>
                            </div>
                        </div>
                        <h3 class="white">{{ __('common.menu_home.contact_info') }}</h3>
                        <p>Email : {{pref('email')}}<br>
                             {{ __('common.menu_home.address') }} : {{pref('alamat')}}</p>
                        <ul class="social-links">
                            <li><a href="{{pref('facebook')}}"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="{{pref('instagram')}}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-links">
                        <h3 class="white">Company</h3>
                        <ul>
                            <li><a href="{{route('about', app()->getLocale())}}"> {{ __('common.menu_about') }}</a></li>
                            <li><a href="{{route('gallery', app()->getLocale())}}">{{ __('common.menu_home.gallery') }}</a></li>
                            <li><a href="{{route('contact', app()->getLocale())}}">{{ __('common.menu_home.contact_us') }}</a></li>
                        </ul>
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

            </div>
        </div>
    </div>
</footer>
