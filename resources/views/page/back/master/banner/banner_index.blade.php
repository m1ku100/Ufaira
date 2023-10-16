@php
    use App\Models\Master\Role;
@endphp

@extends('layout.back.back_main')

@section('title', 'Profile | Banner')

@push('head')

@endpush

@section('page-title', 'Banner')

@push('header-tools')
    @can('create', Role::class)
    @endcan
@endpush

@section('content')
    <div id="app">
        @can('create', \App\Models\Profile\Banner::class)
            <div class="card">
                <div class="card-body">
                    @include('page.back.master.banner.banner_form')
                </div>
            </div>
        @endcan

            <div id="card-banner">

            </div>
    </div>
@endsection

@push('misc')

@endpush

@push('js')
    <script>
        $(document).ready(function () {
            getBanner();
        });

    </script>
    <script>
        $('#form-add-banner').submit(function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = new FormData(this);

            $.ajax({
                type: "POST",
                url: "{{ route('profile.banner.simpan') }}",
                data: form, // serializes the form's elements.
                contentType: false,
                processData: false,
                beforeSend: function () {
                    showLoader('Sedang menyimpan ...');
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Berhasil menambah Banner'
                        });

                        $('#form-add-banner').trigger("reset");
                        $('#gambar_banner').removePreviewImage();

                        getBanner();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'Gagal menambah Banner'
                        });
                    }
                },
            });
        });

    </script>
    <script>
        function getBanner() {
            $('#card-banner').empty();
            $.ajax({
                type: "POST",
                url: "{{ route('profile.banner.get.data') }}",
                contentType: false,
                processData: false,
                success: function (response) {
                    var html = '<div class="row">';

                    $.each(response, function (key, value) {
                        url = '{{ asset("assets/images/banner") }}/' + value.gambar_banner;

                        html += `<div class="col-md-4 mb-3">
							        <div class="card h-100">
							            <img src="` + url + `" class="card-img-top">
                                        @can('delete', \App\Models\Profile\Banner::class)
                        <div class="card-body p-3">
                            <button class="btn btn-danger btn-hapus" onclick="hapus('` + value.uuid_banner + `')">Hapus</button>
							            </div>
                                        @endcan
                        </div>
                    </div>`;
                    });

                    html += '</div>';

                    $('#card-banner').append(html);
                },
            });
        }

    </script>
    <script>
        function hapus(data) {
            var nama = data;
            $.ajax({
                type: "POST",
                url: "{{ route('profile.banner.hapus') }}",
                data: {
                    uuid_banner: nama,
                },
                beforeSend: function () {
                    showLoader('Sedang menghapus ..')
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Berhasil menghapus banner'
                        });

                        getBanner();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'Gagal menghapus banner'
                        });
                    }
                }
            });
        }

    </script>
@endpush
