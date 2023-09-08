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
                                <p class="mar-bottom-20">Foresee the pain and trouble that are bound to ensue and equal fail
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
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London, Foresee the
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
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London to ensue and
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
                                <p class="mar-bottom-20">Find awesome hotel, tour, car and activities in London to ensue and
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
                            <h2 class="bold">We're truely dedicated to make your travel experience as much as simple and fun
                                as possible</h2>
                            <p class="mar-0">Aliquam erat volutpat. Curabitur tempor nibh quis arcu convallis, sed viverra
                                quam sollicitudin. Proin sed augue sed neque ultricies condimentum. In ac ultrices
                                lectus.<br> Nullam ex elit, vestibulum ut urna non, tincidunt condimentum sem. Sed enim
                                tortor, accumsan at consequat et, tempus sit ame</p>
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

    <!-- Trending Starts -->
    <section class="trending">
        <div class="container">
            <div class="section-title">
                <h2>Perfect Holiday Plan</h2>
                <p>Lorem Ipsum is simply dummy text the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s,</p>
            </div>
            <div class="trend-box">
                <div class="row mix tour">
                    <div class="col-md-4 col-sm-6 col-xs-12 mar-bottom-30">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> United Kingdom</p>
                                <h4><a href="#">Stonehenge, Windsor Castle, and Bath from London</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">38 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 mar-bottom-30">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Multi-day Tours</p>
                                    <p class="price">From <span>$899.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Germany</p>
                                <h4><a href="#">Bosphorus and Black Sea Cruise from Istanbul</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">48 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 mar-bottom-30">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>Featured</span></div>
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Attraction Tickets</p>
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Denmark</p>
                                <h4><a href="#">NYC One World Observatory Skip-the-Line Ticket</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">32 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Japan</p>
                                <h4><a href="#">Stonehenge, Windsor Castle, and Bath from London</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">21 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="trend-item">
                            <div class="ribbon ribbon-top-left"><span>25% OFF</span></div>
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Multi-day Tours</p>
                                    <p class="price">From <span>$899.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Italy</p>
                                <h4><a href="#">Bosphorus and Black Sea Cruise from Istanbul</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                    <span class="fa fa-star-half checked"></span>
                                </div>
                                <span class="mar-left-5">48 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="trend-item">
                            <div class="trend-image">
                                <img src="{{asset('front/images/trending1.jpg')}}" alt="image">
                                <div class="trend-tags">
                                    <a href="#"><i class="flaticon-like"></i></a>
                                </div>
                                <div class="trend-price">
                                    <p>Attraction Tickets</p>
                                    <p class="price">From <span>$350.00</span></p>
                                </div>
                            </div>
                            <div class="trend-content">
                                <p><i class="flaticon-location-pin"></i> Turkey</p>
                                <h4><a href="#">NYC One World Observatory Skip-the-Line Ticket</a></h4>
                                <div class="rating mar-bottom-10">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </div>
                                <span class="mar-left-5">18 Reviews</span>
                                <p class="mar-0"><i class="fa fa-clock-o" aria-hidden="true"></i> 3 days & 2 night</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Ends -->

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
                <h2>Today's Top Deals</h2>
                <p>Lorem Ipsum is simply dummy text the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s,</p>
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

    <!-- Reviews starts-->
    <section class="top-review bg-grey">
        <div class="container">
            <div class="section-title">
                <h2>Top Tour Reviews</h2>
                <p>Lorem Ipsum is simply dummy text the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s,</p>
            </div>
            <div class="row">
                <div class="review-slider">
                    <div class="col-md-4 reviews-list align-center">
                        <div class="list-rv-detail">
                            <p class="mar-0"><i class="fa fa-quote-left mar-right-10"></i> Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged</p>
                        </div>
                        <div class="rev-author mar-top-40">
                            <div class="rev-image"><img src="images/inbox3.jpg" alt="image"></div>
                            <div class="rev-content mar-left-20">
                                <h4 class="mar-bottom-5">John Doe</h4>
                                <p class="mar-bottom-5"> CEO/Mario Brand</p>
                                <ul class="list-inline">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 reviews-list align-center">
                        <div class="list-rv-detail">
                            <p class="mar-0"><i class="fa fa-quote-left mar-right-10"></i> Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged</p>
                        </div>
                        <div class="rev-author mar-top-40">
                            <div class="rev-image"><img src="images/inbox1.jpg" alt="image"></div>
                            <div class="rev-content mar-left-20">
                                <h4 class="mar-bottom-5">Drank Bastis Doe</h4>
                                <p class="mar-bottom-5"> COO/Nell & wells Co.</p>
                                <ul class="list-inline">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 reviews-list align-center">
                        <div class="list-rv-detail">
                            <p class="mar-0"><i class="fa fa-quote-left mar-right-10"></i> Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged</p>
                        </div>
                        <div class="rev-author mar-top-40">
                            <div class="rev-image"><img src="images/inbox2.jpg" alt="image"></div>
                            <div class="rev-content mar-left-20">
                                <h4 class="mar-bottom-5">John Doe</h4>
                                <p class="mar-bottom-5"> CEO/Mario Brand</p>
                                <ul class="list-inline">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 reviews-list align-center">
                        <div class="list-rv-detail">
                            <p class="mar-0"><i class="fa fa-quote-left mar-right-10"></i> Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged</p>
                        </div>
                        <div class="rev-author mar-top-40">
                            <div class="rev-image"><img src="images/inbox3.jpg" alt="image"></div>
                            <div class="rev-content mar-left-20">
                                <h4 class="mar-bottom-5">Wayne Nell</h4>
                                <p class="mar-bottom-5"> Director/Franchisis Com</p>
                                <ul class="list-inline">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 reviews-list align-center">
                        <div class="list-rv-detail">
                            <p class="mar-0"><i class="fa fa-quote-left mar-right-10"></i> Lorem Ipsum is simply dummy text
                                of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                make a type specimen book. It has survived not only five centuries, but also the leap into
                                electronic typesetting, remaining essentially unchanged</p>
                        </div>
                        <div class="rev-author mar-top-40">
                            <div class="rev-image"><img src="images/inbox4.jpg" alt="image"></div>
                            <div class="rev-content mar-left-20">
                                <h4 class="mar-bottom-5">Yolksel Doke</h4>
                                <p class="mar-bottom-5"> CEO/Rupens Trator </p>
                                <ul class="list-inline">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Reviews -->

    <!-- top deal starts -->
    <section class="top-deals">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Kami</h2>
                <p>Lorem Ipsum is simply dummy text the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s,</p>
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
