@extends('layout.main_front')
@section('title','UFAIRA | Tentang Kami')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Tentang Kami</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tantang Kami</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <section class="why-us pad-top-80">
        <div class="container">
            <div class="why-us-about mar-bottom-60">
                <div class="row display-flex">
                    <div class="col-md-6 col-xs-12">
                        <div class="why-about-inner">
                            <h4></h4>
                            <h2>Tentang UFAIRA Tour & Travel</h2>
                            <p>Kami merupakan salah satu biro perjalanan dan transportasi yang ada di kota Surabaya dan
                                sudah beroperasi sejak 2013. Kami melayani segala aspek tentang paket liburan mulai dari
                                paket wisata, ziarah, persewaan mobil include driver, gathering perusahaan, outbond, dan
                                rafting.
                                Kita juga sudah berkerja sama dengan berbagai pihak hotel di sekitar Bromo, Ijen,
                                Banyuwangi, Bali, Yogyakarta, Malang DLL</p>
                            <p>
                                Produk Ufaira Tour N Travel
                                City Tour, Explore Adventure, Petualangan Ransel dan Koper yang unik
                                Kategori: Kota, Budaya, Belanja, Kuliner, Pantai, Gunung, Pulau, Air Terjun, dan Budaya Lokal
                                Level: Light Adventure atau Petualangan Ringan
                                Aktivitas: Trekking, Sunrise & Sunset, Snorkeling & Diving, Body Rafting
                                Fasilitas: Backpacker, Standar dan Platinum
                                Tipe: Open Trip, Private dan Group

                            </p>
                            <p>
                                Partner dan Rekan Kerja
                                Ufaira Tour N Travel akan terus melangkah dan berjuang dengan banyak pihak, market
                                place, media partner, hotel, maskapai penerbangan hingga tour agent lain agar lebih
                                memudahkan dalam kebersamaan memperjuangkan destinasi unik Indonesia di Pulau Jawa.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
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
        </div>
    </section>

    @include('layout.components.about_partial')

@endsection
