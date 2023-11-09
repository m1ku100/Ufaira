@extends('layout.main_front')
@section('title','UFAIRA | Rental')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer-rent    text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Rental Mobil</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rental Mobil</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->


    <!-- Destinations -->
    <section class="cars-destinations">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    @foreach(\App\Models\Master\Rental::all() as $item)
                    <div class="blog-list car-list">
                        <div class="mar-bottom-30">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="blog-image">
                                        <a href="javascript:void(0)"
                                           style="background-image: url('{{asset($item->foto)}}'); height: 170px;"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="blog-content">
                                        <p class="price bold">Start <span>Rp {{number_format($item->harga)}}</span> / Hari</p>
                                        <h3 class="blog-title"><a href="javascript:void(0)">{{$item->nama_kendaraan}}</a></h3>

                                        <div class="cartrend-content display-flex space-between">
                                            <p class="mar-bottom-0"><i class="flaticon-location-pin"></i> Jawa Timur</p>
                                        </div>
                                        <div class="para-content">
                                            <span class="mar-right-20"><a href="javascript:void(0)" class="tag"><i
                                                        class="fa fa-user mar-right-5"></i> 1 - {{$item->min_pax}} Orang</a></span>
                                            <span class="mar-right-20"><a href="javascript:void(0)"><i
                                                        class="fa fa-car mar-right-5"></i> {{$item->is_automatic ? 'Automatic' : 'Manual'}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div id="sidebar" class="col-md-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-contact text-center">
                                <img src="{{asset('front/images/wa.png')}}" alt="" style="width: 64px">
                                <h3>Reservasi Sekarang</h3>
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
    <script type="text/javascript">
        function openWa() {

            var link = `https://wa.me/6282218538394` + `?text=Hallo Selamat Siang`;

            var isSafari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 &&
                navigator.userAgent &&
                navigator.userAgent.indexOf('CriOS') == -1 &&
                navigator.userAgent.indexOf('FxiOS') == -1;

            if (isSafari) {
                window.location.assign(link) // Safari
            } else {
                window.open(link)// Chrome
            }
        }
    </script>
@endpush
