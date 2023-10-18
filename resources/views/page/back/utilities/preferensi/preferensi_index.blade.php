@extends('layout.back.back_main')

@section('title', 'Preferensi')

@push('header-tools')
    <a class="btn btn-primary mr-3" href="{{ route('utilities.preferensi.index') }}">Kembali</a>
    <button class="btn btn-success" onclick="simpan()">Simpan</button>
@endpush

@section('page-title', 'Preferensi')

@section('content')
    <h2 class="section-title">Ubah preferensi</h2>
    <p class="section-lead">
        Ubah beberapa bagian web pada halaman ini.
    </p>

    <form id="form" class="row" enctype="multipart/form-data">
        @foreach($daftar_preferensi as $chunk)
            <div class="col-lg-6">
                @foreach($chunk as $preferensi)
                    @include('page.back.utilities.preferensi.preferensi_form', [
                        'preferensi'    => $preferensi
                    ])
                @endforeach
            </div>
        @endforeach
    </form>
@endsection

@push('js')
    <script>
        function simpan() {
            let data = new FormData($('#form')[0]);

            showLoader('Sedang menyimpan ...');

            $.post({
                url: '{{ route('utilities.preferensi.simpan') }}',
                data: data,
                processData: false,
                contentType: false
            }).done(function (response) {
                if (response.success) {
                    swal_success('Berhasil menyimpan preferensi')
                }
            }).fail(ajaxFail);
        }
    </script>
@endpush
