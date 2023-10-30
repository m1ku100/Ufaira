@php
    use App\Models\Master\User;
@endphp

@extends('layout.back.back_main')

@section('title', 'Detail Tour')

@section('page-title', 'Detail Tour '. $data->nama_tour )

@push('header-tools')
    <button type="button" class="btn btn-success" onclick="simpan()">Simpan</button>
@endpush

@section('content')
    <form method="POST">

        <input type="hidden" name="uuid_tour_detail" id="uuid_tour_detail" value="{{$data->uuid_tour}}">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-7">
                                <label for="harga">Harga per Pax</label>
                                <x-input-text id="harga" name="harga"
                                              placeholder="Harga per Orangan"></x-input-text>
                            </div>
                            <div class="col-3">
                                <label for="min_pax">Minimum Pax dalam 1 Paket</label>
                                <x-input-text id="min_pax" name="min_pax"
                                              placeholder="Jumlah Orang dalam 1 Perjalanan"></x-input-text>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <label class="card-title">Syarat & Ketentuan Tour <small>(Bila ada)</small></label>
                        <div class="summernote" id="catatan_karir">
                            {!! $data->getDetail->syarat !!}
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="foto_produk">Foto</label>
                            <div class="row">
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_1" class="foto_produk" name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="foto_produk_lama[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_2" class="foto_produk" name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="foto_produk_lama[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_3" class="foto_produk" name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="foto_produk_lama[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_4" class="foto_produk" name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="foto_produk_lama[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>

    <script>

        $(function () {
            {{--$.post({--}}
            {{--    url :'{{ route('master.produk.get.produkgambar') }}',--}}
            {{--    data: {--}}
            {{--        uuid_produk : data.uuid_produk--}}
            {{--    },--}}
            {{--})--}}
            {{--    .done(function (response) {--}}
            {{--        if (response.success) {--}}
            {{--            $('.btn-hapus-gambar').hide();--}}

            {{--            for (var i in response.data) {--}}
            {{--                $('.foto_produk').eq(i).loadPreviewImage('{{ url("assets/images/produk") }}/' + response.data[i].foto_produk);--}}
            {{--                $('.foto_produk').eq(i).hideBrowseButton();--}}
            {{--                $('.gambar-produk-wrapper').eq(i).find('.btn-hapus-gambar').show();--}}
            {{--                $('.gambar-produk-wrapper').eq(i).find('[name="foto_produk_lama[]"]').val(response.data[i].foto_produk);--}}
            {{--            }--}}
            {{--        } else {--}}
            {{--            Swal.fire({--}}
            {{--                icon: 'error',--}}
            {{--                text: response.message--}}
            {{--            });--}}
            {{--        }--}}
            {{--    })--}}
        });


    </script>
@endpush
