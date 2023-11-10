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
    <x-modal id="form-modal" size="xl" title="Form Rental">
        @include('page.back.master.banner.banner_form_edit')

{{--        <x-slot name="footer">--}}
{{--            <button onclick="submit_edit()" class="btn btn-success" id="btn-simpan">Simpan</button>--}}
{{--        </x-slot>--}}
    </x-modal>
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
							               <div class="card-body">
							            <h6> Judul : ` + value.judul_banner + `</h6> <br>
							            <h6> Sub Judul : ` + value.sub_judul_banner + ` </h6>
							                </div>
                                        @can('delete', \App\Models\Profile\Banner::class)
                        <div class="card-footer">

                            <button class="btn btn-danger btn-hapus" onclick="before_hapus('` + value.uuid_banner + `')">Hapus</button>
                            <button class="btn btn-info" onclick="edit('` + url + `','` + value.uuid_banner + `','` + value.judul_banner + `','` + value.sub_judul_banner + `','` + value.gambar_banner + `')"> Edit </button>
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

        function edit(url, uuid, judul,sub_judul,image) {
            console.log(judul)
            $('#judul_banner_edit').val(judul);

            $('#uuid_banner').val(uuid);

            $('#sub_judul_banner_edit').val(sub_judul);

            $('#foto_lama').val(image);

            $('#gambar_banner_edit').loadPreviewImage(url);

            $('#form-modal').modal('show');

        }

        function submit_edit(){
            $('#form-edit-banner').submit();
        }

        $('#form-edit-banner').submit(function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = new FormData(this);

            $.ajax({
                type: "POST",
                url: "{{ route('profile.banner.edit') }}",
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

                        $('#form-modal').modal('hide');

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


        function before_hapus(data) {

            swal_confirm('Anda akan menghapus banner ini')
                .then(function (response) {
                    if (response.value) {
                        hapus(data);
                    }
                });
        }


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
