<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('assets/back/back/images/LOGO+GOLD.png') }}" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/back/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/chatbox.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/back/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/back/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/jquery.toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/css/components.css') }}">

    @stack('head')

    <script>
        window.csrf_token = '{{ csrf_token() }}';
    </script>
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                @if(Auth::user()->hasRole(\App\Models\Master\Role::PELANGGAN))
                    <li class="dropdown dropdown-list-toggle">
                        {{--                        <a href="{{ route('pelanggan.pesanan.keranjang') }}" class="nav-link nav-link-lg beep">--}}
                        {{--                            <i class="fas fa-shopping-cart"></i>--}}
                        {{--                        </a>--}}
                    </li>
                @endif

                {{--                @if(Auth::user()->hasRole(\App\Models\Master\Role::DOKTER))--}}
                {{--                        <?php--}}
                {{--                        $listKonsultasi = \App\Models\Transaksi\Konsultasi::query()->where('status_konsultasi', \App\Models\Transaksi\Konsultasi::BELUM_VERIFIKASI_DOKTER)->get();--}}
                {{--                        ?>--}}
                {{--                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"--}}
                {{--                                                                 class="nav-link notification-toggle nav-link-lg @if(count($listKonsultasi) > 0) beep @endif"><i--}}
                {{--                                class="far fa-bell" style="font-size: 18pt"></i></a>--}}
                {{--                        <div class="dropdown-menu dropdown-list dropdown-menu-right">--}}
                {{--                            <div class="dropdown-header">Notifikasi--}}
                {{--                                <div class="float-right">--}}
                {{--                                    <a href="#">Pasien Konsultasi</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="dropdown-list-content dropdown-list-icons">--}}

                {{--                                @foreach($listKonsultasi as $item)--}}
                {{--                                    <a href="#" class="dropdown-item">--}}
                {{--                                        <div class="dropdown-item-icon bg-info text-white">--}}
                {{--                                            <i class="far fa-user"></i>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="dropdown-item-desc">--}}
                {{--                                            <b class="text-primary">{{$item->getPelanggan(false)->getPengguna(false)->nama_pengguna}}</b>--}}
                {{--                                            akan melakukan konsultasi--}}
                {{--                                            <div--}}
                {{--                                                class="time">{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</div>--}}
                {{--                                        </div>--}}
                {{--                                    </a>--}}
                {{--                                @endforeach--}}

                {{--                            </div>--}}
                {{--                            <div class="dropdown-footer text-center">--}}
                {{--                                <a href="{{route('konsultasi.index')}}">View All <i--}}
                {{--                                        class="fas fa-chevron-right"></i></a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </li>--}}
                {{--                @endif--}}

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        @if(is_not_null(auth()->user()->foto_pengguna))
                            <img alt="image"
                                 src="" id="profilePhoto"
                                 class="rounded-circle mr-1">
                        @else
                            <img alt="image" src="{{ asset('assets/back/images/user.png') }}" class="rounded-circle mr-1">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item has-icon text-danger" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        @include('layout.back.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('page-title')</h1>

                    <div class="section-header-breadcrumb">
                        @stack('header-tools')
                    </div>
                </div>

                <div class="section-body">
                    @yield('content')
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018
                <div class="bullet"></div>
                Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">
                2.3.0
            </div>
        </footer>
    </div>
</div>


@stack('misc')


<!-- General JS Scripts -->
<script src="{{ asset('assets/back/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/back/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/back/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/back/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/back/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/back/js/stisla.js') }}"></script>
<script src="{{ asset('assets/back/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('assets/back/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/back/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/back/js/flatpickr_id.js') }}"></script>
<script src="{{ asset('assets/back/js/flatpickr.min.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script src="{{asset('assets/back/js/summernote-image-captionit.js')}}"></script>
<script src="{{ asset('assets/back/js/vue.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->

<script src="{{asset('assets/Back/js/axios.js')}}"></script>
<script src="{{ asset('assets/back/js/scripts.js') }}"></script>
<script src="{{ asset('assets/back/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="{{asset('assets/back/js/modules-chartjs.js')}}"></script>

<script>


    $(function () {
    });

</script>
@stack('js')
<!-- Page Specific JS File -->
</body>

</html>
