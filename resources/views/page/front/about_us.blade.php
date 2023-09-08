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
                            <h4>Amazing Places To Enjony Your Travel</h4>
                            <h2>About Our Super Travel</h2>
                            <p>Aliquam erat volutpat. Curabitur tempor nibh quis arcu convallis, sed viverra quam sollicitudin. Proin sed augue sed neque ultricies condimentum. In ac ultrices lectus.<br> Nullam ex elit, vestibulum ut urna non, tincidunt condimentum sem. Sed enim tortor, accumsan at consequat et, tempus sit ame</p>

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
