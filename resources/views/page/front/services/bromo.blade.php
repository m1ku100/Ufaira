@extends('layout.main_front')
@section('title','UFAIRA | Trip Bromo')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Gunung Bromo</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trip Gn. Bromo</li>
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
                        <h2 class="mar-bottom-5"><a href="car-detail.html">Trip Gunung Bromo</a></h2>
                        <h3><strong class="color-red-3">RP. 850.000</strong> / Pax (Min 5 Pax)</h3>
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
                                <div class="itinerary-item">
                                    <button type="button" class="btn btn-info" data-target="#it1"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                    <p class="mar-bottom-0"><span>1.  </span> Penanjakan ( Sunrise View )</p>

                                </div>
                                <div class="itinerary-item">
                                    <button type="button" class="btn btn-info" data-target="#it2"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                    <p class="mar-bottom-0"><span>2. </span> Kawasan Bromo</p>
                                    <div id="it2" class="collapse itinerary-para">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.
                                    </div>
                                </div>
                                <div class="itinerary-item">
                                    <button type="button" class="btn btn-info" data-target="#it3"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                    <p class="mar-bottom-0"><span>3. </span> Pasir Berbisik</p>
                                    <div id="it3" class="collapse itinerary-para">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.
                                    </div>
                                </div>
                                <div class="itinerary-item">
                                    <button type="button" class="btn btn-info" data-target="#it4"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                                    <p class="mar-bottom-0"><span>4. </span> Bukit Savana</p>
                                    <div id="it4" class="collapse itinerary-para">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.
                                    </div>
                                </div>
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
                                            <li><i class="fa fa-check"></i> Akomodasi Transport PP (Pergi Pulang)</li>
                                            <li><i class="fa fa-check"></i> Hardtop Bromo</li>
                                            <li><i class="fa fa-check"></i> Tiket masuk lokal wisata bromo</li>
                                            <li><i class="fa fa-check"></i> Makan 2x</li>
                                            <li><i class="fa fa-check"></i> Minum 600ml 4x</li>
                                            <li><i class="fa fa-check"></i> Guide Lokal</li>
                                            <li><i class="fa fa-check"></i> Supir & BBM</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Exclude</h4>
                                        <ul>
                                            <li><i class="fa fa-close" style="color: palevioletred"></i> Biaya Masuk
                                                Toll
                                            </li>
                                            <li><i class="fa fa-close" style="color: palevioletred"></i> Tiket masuk
                                                wisata yang tidak dalam paket
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="description mar-bottom-30">
                            <h3>Syarat & Ketentuan </h3>
                            <ul class="expect">
                                <li><i class="fa fa-circle"></i>Harga di atas berlaku untuk WNI, terdapat charge untuk
                                    tiket dan service WNA sebesar Rp xxx.xxx ,- per orang (dapat dibayar langsung ke
                                    driver di hari-H)
                                </li>
                                <li><i class="fa fa-circle"></i> Kami menerima pembayaran penuh atau 30% di muka sebagai
                                    tanda jadi, pelunasan bisa dibayarkan cash ke tour leader / via transfer / QRIS
                                </li>
                                <li><i class="fa fa-circle"></i> Tanda jadi tidak dapat direfund bila terjadi pembatalan
                                    dari pihak tamu, reschedule kadangkala memungkinkan untuk konfirmasi maksimal H-1
                                </li>
                                <li><i class="fa fa-circle"></i> Destinasi Wisata tidak baku dan dapat berubah karena
                                    kondisi di area Bromo (lalu lintas, cuaca) tanpa mengganggu agenda secara
                                    keseluruhan
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>

                <!-- Side Menu & Cars-->
                <div id="sidebar" class="col-md-4">
                    <aside class="detail-sidebar sidebar-wrapper">

                        <div class="sidebar-item">
                            <div class="detail-title">
                                <h3>Pilihan Kendaraan</h3>
                            </div>
                            <div class="sidebar-content about-slider">
                                <div class="sidebar-package">
                                    <div class="sidebar-package-image">
                                        <img src="{{asset('front/images/cars/zenix.png')}}" alt="Images">
                                    </div>
                                    <div class="destination-content mar-top-20">
                                        <div class="destination-title">
                                            <h4><a href="car-detail.html">Toyota Zenix</a></h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="sidebar-package">
                                    <div class="sidebar-package-image">
                                        <img src="{{asset('front/images/cars/apv.png')}}" alt="Images">
                                    </div>
                                    <div class="destination-content mar-top-20">
                                        <div class="destination-title">
                                            <h4><a href="car-detail.html">Toyota APV</a></h4>
                                        </div>

                                    </div>
                                </div>

                                <div class="sidebar-package">
                                    <div class="sidebar-package-image">
                                        <img src="{{asset('front/images/cars/evalia.png')}}" alt="Images">
                                    </div>
                                    <div class="destination-content mar-top-20">
                                        <div class="destination-title">
                                            <h4><a href="car-detail.html">Nissan Evalia</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-contact text-center">
                                <i class=" fa fa-phone-alt"></i>
                                <h3><span>Reservasi</span> Sekarang</h3>
                                <a href="tel://082218538394" class="phone">+62 822 1853 8394</a>
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
