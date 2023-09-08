@extends('layout.main_front')
@section('title','UFAIRA | Kontak Kami')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Kontak Kami</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kontak Kami</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- contact starts -->
    <section class="contact-main">
        <div class="container">
            <div class="contact-info mar-bottom-30">
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <p>445 Mount Eden Road, Mt Edenward land</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <p>977-444-666-888</p>
                                <p>977-444-222-000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <p>info@Nepayatri.com</p>
                                <p>help@Nepayatri.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-map">
                <div class="row">
                    <div class="col-md-5">
                        <div style="height: 535px; ">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.6621169623368!2d112.72862947579449!3d-7.3917059727721375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e46403f22dff%3A0xdcb56ac94bb1b8cc!2sKlinik%20DNY%20Skincare%20Taman%20Paris!5e0!3m2!1sen!2sid!4v1694175846614!5m2!1sen!2sid"
                                width="1200" height="535" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- contact Ends -->

@endsection

@push('js')

@endpush
