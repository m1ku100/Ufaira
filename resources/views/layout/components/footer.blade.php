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
                                    <p class="bold mar-0"><span>Telpon :</span> {{pref('display_telp')}}</p>
                                </div>
                            </div>
                        </div>
                        <h3 class="white">Kontak Info</h3>
                        <p>Email : {{pref('email')}}<br>
                            Alamat : {{pref('alamat')}}</p>
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
                            <li><a href="{{route('about')}}">Tentang Kami</a></li>
                            <li><a href="{{route('gallery')}}">Galeri</a></li>
                            <li><a href="{{route('contact')}}">Kontak Kami</a></li>
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
