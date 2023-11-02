@extends('layout.main_front')
@section('title','UFAIRA | Gallery')

@section('content')

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 class="white">Gallery</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- top deal starts -->
    <section class="top-deals">
        <div class="container">
            <div class="section-title">
                <h2>Galeri Kami</h2>
                <p></p>
            </div>
            <div class="row mar-top-50">
                @foreach(\App\Models\Master\Gallery::all() as $item)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                <img src="{{asset('assets/images/gallery/'.$item->gambar_gallery)}}" alt="image">
                            </div>
                            <div class="gallery-content">
                                <ul>
                                    <li><a href="{{asset('assets/images/gallery/'.$item->gambar_gallery)}}" data-lightbox="gallery"
                                           data-title="Title"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link"></i></a></li>
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
