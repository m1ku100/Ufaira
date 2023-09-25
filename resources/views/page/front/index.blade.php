@extends('layout.main_front')
@section('title','UFAIRA | Home')

@section('content')

    <!-- banner starts -->
    <section class="banner">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image"
                                 style="background-image:url({{asset('front/images/slider/bromo.jpg')}})"></div>
                            <div class="swiper-content">
                                <h1>Make you Free to <span>travel</span> with us</h1>
                                <p class="mar-bottom-20">Foresee the pain and trouble that are bound to ensue and equal
                                    fail
                                    in their duty through weakness. </p>
                                <a href="" class="biz-btn">Explore More</a>
                                <a href="" class="biz-btn mar-left-10">Contact Us</a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image"
                                 style="background-image:url({{asset('front/images/slider/bromo2.jpg')}})"></div>
                            <div class="swiper-content">
                                <h1><span>Sensation Ice Trip</span> Is Coming For Kids</h1>
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London, Foresee
                                    the
                                    pain and trouble</p>
                                <a href="" class="biz-btn">Find More</a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image"
                                 style="background-image:url({{asset('front/images/slider/ijen.jpg')}})"></div>
                            <div class="swiper-content">
                                <h1>Your <span>Adventure</span> Wonderful Travel Calls Fast</h1>
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London to ensue
                                    and
                                    equal fail in their duty</p>
                                <a href="" class="biz-btn">View More</a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner">
                            <div class="slide-image"
                                 style="background-image:url({{asset('front/images/slider/ijen2.jpg')}})"></div>
                            <div class="swiper-content">
                                <h1>Your <span>Adventure</span> Wonderful Travel Calls Fast</h1>
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London to ensue
                                    and
                                    equal fail in their duty</p>
                                <a href="" class="biz-btn">View More</a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </div>
    </section>
    <!-- banner ends -->

    <!-- form starts -->
    <section class="banner-form">
        <div class="container">
            <div class="row display-flex">
                <div class="col-md-7 col-sm-12">
                    <div class="why-us-about">
                        <div class="why-about-inner">
                            <h3 class="mar-bottom-5 themecolor">Tentang UFAIRA</h3>
                            <h2 class="bold">Kami Benar-Benar Berdedikasi Untuk Membuat Pengalaman Perjalanan Anda
                                Semudah dan Menyenangkan Mungkin</h2>
                            <p class="mar-0">Kami merupakan salah satu biro perjalanan dan transportasi yang ada di kota
                                Surabaya dan sudah beroperasi sejak 2013. Kami melayani segala aspek tentang paket
                                liburan mulai dari paket wisata, ziarah, persewaan mobil include driver, gathering
                                perusahaan, outbond, dan rafting. Kita juga sudah berkerja sama dengan berbagai pihak
                                hotel di sekitar Bromo, Ijen, Banyuwangi, Bali, Yogyakarta, Malang DLL.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <div class="form-content">
                        <div class="tab-content">
                            <div id="travel" class="tab-pane in active">
                                <img src="{{asset('front/images/maskot ufaira fix2.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- form ends -->

    <!-- why us starts -->
    @include('layout.components.about_partial')
    <!-- why us ends -->


    <!-- cta_one starts -->
    <section class="cta-one">
        <div class="container">
            <div class="cta-one_block display-flex space-between">
                <h2 class="white mar-bottom-0">Mulai Perjalananmu Sekarang Juga</h2>
                <a href="contact.html" class="biz-btn-white">Hubungi Kami</a>
            </div>
        </div>
    </section>
    <!-- cta_one ends -->

    <!-- top deal starts -->
    <section class="top-deals">
        <div class="container">
            <div class="section-title">
                <h2>Rental Mobil</h2>
            </div>
            <div class="row top-deal-slider">
                <div class="col-md-4 slider-item">
                    <div class="slider-image">
                        <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                    </div>
                    <div class="slider-content">
                        <h6 class="mar-bottom-10"><i class="fa fa-map-marker-alt"></i> United Kingdom</h6>
                        <h4><a href="#">Earning Asiana Club Miles</a></h4>
                        <p>With upto 30% Off, experience Europe your way!</p>
                        <div class="deal-price">
                            <p class="price">From <span>$250.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 slider-item">
                    <div class="slider-image">
                        <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                    </div>
                    <div class="slider-content">
                        <h6 class="mar-bottom-10"><i class="fa fa-map-marker-alt"></i> Thailand</h6>
                        <h4><a href="#">Save big on hotels!</a></h4>
                        <p>With upto 30% Off, experience Europe your way!</p>
                        <div class="deal-price">
                            <p class="price">From <span>$250.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 slider-item">
                    <div class="slider-image">
                        <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                    </div>
                    <div class="slider-content">
                        <h6 class="mar-bottom-10"><i class="fa fa-map-marker-alt"></i> South Korea</h6>
                        <h4><a href="#">Experience Europe Your Way</a></h4>
                        <p>With upto 30% Off, experience Europe your way!</p>
                        <div class="deal-price">
                            <p class="price">From <span>$250.00</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 slider-item">
                    <div class="slider-image">
                        <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                    </div>
                    <div class="slider-content">
                        <h6 class="mar-bottom-10"><i class="fa fa-map-marker-alt"></i> Germany</h6>
                        <h4><a href="#">Earning Asiana Club Miles</a></h4>
                        <p>With upto 30% Off, experience Europe your way!</p>
                        <div class="deal-price">
                            <p class="price">From <span>$250.00</span></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top deal ends -->


    <!-- top deal starts -->
    <section class="top-deals">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Kami</h2>

            </div>
            <div class="row mar-top-50">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="{{asset('front/images/gallery/galery_1.jpg')}}" alt="image">
                        </div>
                        <div class="gallery-content">
                            <ul>
                                <li><a href="{{asset('front/images/gallery/galery_1.jpg')}}" data-lightbox="gallery"
                                       data-title="Title"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="{{asset('front/images/gallery/galery_2.jpg')}}" alt="image">
                        </div>
                        <div class="gallery-content">
                            <ul>
                                <li><a href="{{asset('front/images/gallery/galery_2.jpg')}}" data-lightbox="gallery"
                                       data-title="Title"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="gallery-item">
                        <div class="gallery-image">
                            <img src="{{asset('front/images/gallery/galery_3.jpg')}}" alt="image">
                        </div>
                        <div class="gallery-content">
                            <ul>
                                <li><a href="{{asset('front/images/gallery/galery_3.jpg')}}" data-lightbox="gallery"
                                       data-title="Title"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- top deal ends -->

@endsection
