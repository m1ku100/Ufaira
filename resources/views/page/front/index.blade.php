@extends('layout.main_front')
@section('title','UFAIRA | Home')

@section('content')

    <!-- banner starts -->
    <section class="banner">
        <div class="slider">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach(\App\Models\Master\Banner::all() as $item)
                        <div class="swiper-slide">
                            <div class="slide-inner">
                                <div class="slide-image"
                                     style="background-image:url({{asset('assets/images/banner/'.$item->gambar_banner)}})"></div>
                                <div class="swiper-content">
                                    <h1>{{$item->judul_banner}}</h1>
                                    <p class="mar-bottom-20">{{$item->sub_judul_banner}} </p>
                                    <button onclick="openWa()" class="biz-btn mar-left-10">{{__('common.menu_home.contact_us')}}</button>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    @endforeach
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
                            <h3 class="mar-bottom-5 themecolor"> {{ __('common.menu_home.title_section') }}</h3>
                            <h2 class="bold">{{ __('common.menu_home.tag_line') }}</h2>
                            <p class="mar-0">{{ __('common.menu_home.tag_content') }}</p>
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
    <section class="contact-main">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('common.menu_home.find_us') }}</h2>
            </div>
            <div class="contact-map">
                <div class="row">
                    <div class="col-md-5">
                        <div style="height: 535px; ">
                            {!! pref('koodinat') !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- cta_one starts -->
    <section class="cta-one">
        <div class="container">
            <div class="cta-one_block display-flex space-between">
                <h2 class="white mar-bottom-0">{{ __('common.menu_home.trigger_call') }}</h2>
                <button onclick="openWa()" class="biz-btn-white">{{ __('common.menu_home.contact_us') }}</button>
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
                @foreach(\App\Models\Master\Rental::all() as $item)
                    <div class="col-md-4 slider-item">
                        <div class="slider-image">
                            <img src="{{asset($item->foto)}}" alt="image">
                        </div>
                        <div class="slider-content">
                            <h6 class="mar-bottom-10"><i class="fa fa-map-marker-alt"></i> Jawa Timur </h6>
                            <h4><a href="{{ route('rental', app()->getLocale()) }}">{{$item->nama_kendaraan}}</a></h4>
                            <p>{{$item->is_automatic ? 'Automatic' : 'Manual'}} || {{ __('common.menu_home.passanger') }}  1 - {{$item->min_pax}}
                                {{ __('common.menu_home.uom') }} </p>
                            <div class="deal-price">
                                <p class="price">Rp {{number_format($item->harga)}} <span></span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- top deal ends -->


    <!-- top deal starts -->
    <section class="top-deals">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('common.menu_home.gallery') }}</h2>

            </div>
            <div class="row mar-top-50">
                @foreach(\App\Models\Master\Gallery::query()->take(6)->get() as $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <img src="{{asset('assets/images/gallery/'.$item->gambar_gallery)}}" alt="image">
                            </div>
                            <div class="gallery-content">
                                <ul>
                                    <li><a href="{{asset('assets/images/gallery/'.$item->gambar_gallery)}}"
                                           data-lightbox="gallery"
                                           data-title="Title"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-link"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- top deal ends -->

@endsection
