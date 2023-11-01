@extends('layout.main_front')
@section('title','UFAIRA | Trip Bromo - Ijen')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">{{$data->nama_tour}}</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trip {{$data->nama_tour}}</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Destination Starts -->
    <section class="car-detail">
        <div class="container">

            <div class="row">
                <div id="content" class="col-md-8">
                    <div class="destination-content">
                        <h2 class="mar-bottom-5"><a href="{{route('bromo')}}">Trip {{$data->nama_tour}}</a></h2>
                        <h3><strong class="color-red-3">RP. {{number_format($data->getDetail->harga)}}</strong> / Pax (Min {{$data->getDetail->min_pax}} Pax)</h3>
                    </div>
                    <div class="single-slider mar-bottom-30">
                        <div class="slider-1 slider-store">
                            <div class="detail-slider-item">
                                <img src="{{asset('front/images/slider/bromo2.jpg')}}" alt="image">
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('front/images/slider/bromo.jpg')}}" alt="image">
                            </div>
                        </div>
                        <div class="slider-1 slider-thumbs">
                            <div class="detail-slider-item">
                                <img src="{{asset('front/images/slider/bromo2.jpg')}}" alt="image">
                            </div>
                            <div class="detail-slider-item">
                                <img src="{{asset('front/images/slider/bromo.jpg')}}" alt="image">
                            </div>

                        </div>
                    </div>

                    <div class="description detail-box">

                        <div class="description-content">
                            <!-- Destination Starts -->
                            <div class="itinerary mar-bottom-30">
                                <h3>Destinasi Wisata</h3>
                                @foreach(json_decode($data->getDetail->destinasi) as $key => $item)
                                <div class="itinerary-item">
                                    <button type="button" class="btn btn-info" data-target="#it1"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                    <p class="mar-bottom-0"><span>{{$key + 1}}.  </span> {{$item}}</p>

                                </div>
                                @endforeach
                            </div>


                            <!-- Pros Cons -->
                            <div class="car-specifi">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4>Pelayanan yang kami tawarkan: </h4>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Include</h4>
                                        <ul>
                                            @foreach(json_decode($data->getDetail->layanan_include) as $key => $item)
                                            <li><i class="fa fa-check"></i> {{$item}}</li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Exclude</h4>
                                        <ul>
                                            @foreach(json_decode($data->getDetail->layanan_exclude) as $key => $item)
                                            <li><i class="fa fa-close" style="color: palevioletred"></i> {{$item}}
                                            </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="description mar-bottom-30">
                            <h3>Syarat & Ketentuan </h3>
                            <ul class="expect">
                              {!! $data->getDetail->syarat !!}
                            </ul>
                        </div>
                    </div>


                </div>

                <!-- Side Menu & Cars-->
                <div id="sidebar" class="col-md-4">
                    <aside class="detail-sidebar sidebar-wrapper">


                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-contact text-center">
                                <i class=" fa fa-phone-alt"></i>
                                <h3><span>Reservasi</span> Sekarang</h3>
                                <button onclick="openWa()" class="btn btn-primary" target="_blank">Hubungi Kami</button>
                                <small>Senin - Minggu | 08:00 - 17:00</small>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Destination Ends -->
@endsection

@push('js')

@endpush
