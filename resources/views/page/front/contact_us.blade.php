@extends('layout.main_front')
@section('title','UFAIRA | Kontak Kami')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">    {{ __('common.menu_contact') }}</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {{ __('common.menu_contact') }}</li>
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
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="info-content">
                                <p>{{pref('alamat')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <p>{{ __('common.menu_home.contact') }} </p>
                                <p> (+62) 822 1853 8394</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <p>Email </p>
                                <p>{{pref('email')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- contact Ends -->

@endsection

@push('js')

@endpush
