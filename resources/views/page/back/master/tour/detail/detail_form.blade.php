@php
    use App\Models\Master\User;
@endphp

@extends('layout.back.back_main')

@section('title', 'Detail Tour')

@section('page-title', 'Detail Tour '. $data->nama_tour )

@push('header-tools')
    <a href="{{route('trip',['slug'=>$data->slug_tour])}}" class="btn btn-info mr-3" target="_blank">Lihat Hasil</a>
    <button type="button" class="btn btn-success" onclick="simpan()">Simpan</button>
@endpush

@section('content')
    <form method="POST" id="form-data">

        <input type="hidden" name="uuid_tour_detail" id="uuid_tour_detail"
               value="{{$data->getDetail->uuid_tour_detail}}">
        <input type="hidden" name="uuid_tour" id="uuid_tour_detail" value="{{$data->uuid_tour}}">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-7">
                                <label for="harga">Harga per Pax</label>
                                <x-input-text id="harga" name="harga" value="{{$data->getDetail->harga}}"
                                              placeholder="Harga per Orangan"></x-input-text>
                            </div>
                            <div class="col-3">
                                <label for="min_pax">Minimum Pax dalam 1 Paket</label>
                                <x-input-text id="min_pax" name="min_pax" value="{{$data->getDetail->min_pax}}"
                                              placeholder="Jumlah Orang dalam 1 Perjalanan"></x-input-text>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label class="card-title">Destinasi Tour </label>
                        <br>
                        <button type="button" class="btn btn-primary btn-sm add">Tambah Data</button>
                        <button type="button" class="btn btn-danger btn-sm remove d-none">Hapus Data</button>

                        @if($data->getDetail->layanan_include != null)
                            @foreach(json_decode($data->getDetail->layanan_include) as $key => $item)
                                @if($key == 0)

                                    <div class="input-group mb-3 mt-4" id="div_destinasi_1">
                                        <input type="text" class="form-control" placeholder="Destinasi Wisata" name="destinasi[]" value="{{$item}}"
                                               aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else

                            <div class="input-group mb-3 mt-4" id="div_destinasi_1">
                                <input type="text" class="form-control" placeholder="Destinasi Wisata" name="destinasi[]"
                                       aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-prepend">

                                </div>
                            </div>
                        @endif



                        <div id="new_chq">
                            @if($data->getDetail->destinasi != null)
                                @foreach(json_decode($data->getDetail->destinasi) as $key => $item)
                                    @if($key != 0)
                                        <div class="input-group mb-3 mt-4" id="div_destinasi_{{$key+1}}">
                                            <input type="text" class="form-control" placeholder="Destinasi Wisata"
                                                   name="destinasi[]" aria-label="" aria-describedby="basic-addon1"
                                                   value="{{$item}}">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-danger"
                                                        onclick="removeDestinasi('{{$key + 1}}')" type="button">Hapus
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <input type="hidden" value="1" id="total_chq">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Layanan Include</label>
                                <br>
                                <button type="button" class="btn btn-primary btn-sm add_include">Tambah Data</button>
                                <button type="button" class="btn btn-danger btn-sm remove d-none">Hapus Data</button>

                                @if($data->getDetail->layanan_include != null)
                                    @foreach(json_decode($data->getDetail->layanan_include) as $key => $item)
                                        @if($key == 0)
                                            <div class="input-group mb-3 mt-4" id="div_include_1">
                                                <input type="text" class="form-control"
                                                       placeholder="Hal yang termasuk dalam layanan"
                                                       name="layanan_include[]" value="{{$item}}"
                                                       aria-label="" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="input-group mb-3 mt-4" id="div_include_1">
                                        <input type="text" class="form-control"
                                               placeholder="Hal yang termasuk dalam layanan" name="layanan_include[]"
                                               aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">

                                        </div>
                                    </div>
                                @endif


                                <div id="new_include">
                                    @if($data->getDetail->layanan_include != null)
                                        @foreach(json_decode($data->getDetail->layanan_include) as $key => $item)
                                            @if($key != 0)
                                                <div class="input-group mb-3 mt-4" id="div_include_{{$key+1}}">
                                                    <input type="text" class="form-control"
                                                           placeholder="Hal yang termasuk dalam layanan"
                                                           name="layanan_include[]" aria-label=""
                                                           aria-describedby="basic-addon1"
                                                           value="{{$item}}">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-danger"
                                                                onclick="removeInclude('{{$key + 1}}')" type="button">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <input type="hidden" value="1" id="total_include">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <label class="card-title">Layanan Include</label>
                                <br>
                                <button type="button" class="btn btn-primary btn-sm add_exclude">Tambah Data</button>
                                <button type="button" class="btn btn-danger btn-sm remove d-none">Hapus Data</button>

                                @if($data->getDetail->layanan_exclude != null)
                                    @foreach(json_decode($data->getDetail->layanan_exclude) as $key => $item)
                                        @if($key == 0)
                                            <div class="input-group mb-3 mt-4" id="div_include_1">
                                                <input type="text" class="form-control" value="{{$item}}"
                                                       placeholder="Hal yang tidak termasuk dalam layanan"
                                                       name="layanan_exclude[]"
                                                       aria-label="" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="input-group mb-3 mt-4" id="div_include_1">
                                        <input type="text" class="form-control"
                                               placeholder="Hal yang tidak termasuk dalam layanan"
                                               name="layanan_exclude[]"
                                               aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-prepend">

                                        </div>
                                    </div>
                                @endif


                                <div id="new_exclude">
                                    @if($data->getDetail->layanan_exclude != null)
                                        @foreach(json_decode($data->getDetail->layanan_exclude) as $key => $item)
                                            @if($key != 0)
                                                <div class="input-group mb-3 mt-4" id="div_exclude_{{$key+1}}">
                                                    <input type="text" class="form-control"
                                                           placeholder="Hal yang tidak termasuk dalam layanan"
                                                           name="layanan_exclude[]" aria-label=""
                                                           aria-describedby="basic-addon1"
                                                           value="{{$item}}">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-danger"
                                                                onclick="removeExclude('{{$key + 1}}')" type="button">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <input type="hidden" value="1" id="total_exclude">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <label class="card-title">Syarat & Ketentuan Tour <small>(Bila ada)</small></label>
                        <div class="summernote" id="syarat">
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
                                    <x-input-image :base64="false" id="foto_produk_1" class="foto_produk"
                                                   name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="gambar_gallery[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_2" class="foto_produk"
                                                   name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="gambar_gallery[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_3" class="foto_produk"
                                                   name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="gambar_gallery[]" value="">
                                    <button class="btn btn-danger btn-sm btn-hapus-gambar" type="button">Hapus</button>
                                </div>
                                <div class="col-xl-3 col-6 gambar-produk-wrapper">
                                    <x-input-image :base64="false" id="foto_produk_4" class="foto_produk"
                                                   name="foto_produk[]"></x-input-image>
                                    <input type="hidden" name="gambar_gallery[]" value="">
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
            $('.add').on('click', add);
            $('.remove').on('click', remove);

            $('.add_include').on('click', addInclude);
            $('.add_exclude').on('click', addExclude);

            $('.foto_produk').change(function () {
                let wrapper = $(this).parents('.gambar-produk-wrapper');

                wrapper.find('.btn-hapus-gambar').show();
            })

            $('.btn-hapus-gambar').click(function () {
                let wrapper = $(this).parents('.gambar-produk-wrapper');
                let inputfile = wrapper.find('input:file');

                if (inputfile.prop('files') && inputfile.prop('files')[0]) {
                    inputfile.val(null);
                }

                wrapper.find('[id^="image-preview"]').html('');
                wrapper.find('[name="foto_produk_lama[]"]').val('');
                wrapper.find('[id*="-chooser"]').show();

                $(this).hide();
            });

            $.post({
                url :'{{ route('master.tour.get.gallery') }}',
                data: {
                    uuid_tour_detail : '{{$data->getDetail->uuid_tour_detail}}'
                },
            })
                .done(function (response) {
                    if (response.success) {
                        $('.btn-hapus-gambar').hide();

                        for (var i in response.data) {
                            $('.foto_produk').eq(i).loadPreviewImage('{{ url("assets/images/gallery") }}/' + response.data[i].gambar_gallery);
                            $('.foto_produk').eq(i).hideBrowseButton();
                            $('.gambar-produk-wrapper').eq(i).find('.btn-hapus-gambar').show();
                            $('.gambar-produk-wrapper').eq(i).find('[name="gambar_gallery[]"]').val(response.data[i].gambar_gallery);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: response.message
                        });
                    }
                })
        });

        function add() {
            var new_chq_no = parseInt($('#total_chq').val()) + 1;
            var new_input = '   <div class="input-group mb-3 mt-4" id="div_destinasi_' + new_chq_no + '">' +
                '    <input type="text" class="form-control" placeholder="Destinasi Wisata" name="destinasi[]" aria-label="" aria-describedby="basic-addon1">' +
                '  <div class="input-group-prepend">' +
                '  <button class="btn btn-outline-danger" onclick="removeDestinasi(' + new_chq_no + ')" type="button">Hapus</button>' +
                ' </div>' +
                ' </div>';

            $('#new_chq').append(new_input);

            $('#total_chq').val(new_chq_no);
        }

        function remove() {
            var last_chq_no = $('#total_chq').val();

            if (last_chq_no > 1) {
                $('#new_' + last_chq_no).remove();
                $('#total_chq').val(last_chq_no - 1);
            }
        }

        function removeDestinasi(param) {
            $('#div_destinasi_' + param).remove();
        }

        function addInclude() {
            var new_chq_no = parseInt($('#total_include').val()) + 1;
            var new_input = '   <div class="input-group mb-3 mt-4" id="div_include_' + new_chq_no + '">' +
                '    <input type="text" class="form-control" placeholder="Hal yang termasuk dalam layanan" name="layanan_include[]" aria-label="" aria-describedby="basic-addon1">' +
                '  <div class="input-group-prepend">' +
                '  <button class="btn btn-outline-danger" onclick="removeInclude(' + new_chq_no + ')" type="button">Hapus</button>' +
                ' </div>' +
                ' </div>';

            $('#new_include').append(new_input);

            $('#total_include').val(new_chq_no);
        }

        function removeInclude(param) {
            $('#div_include_' + param).remove();
        }

        function addExclude() {
            var new_chq_no = parseInt($('#total_exclude').val()) + 1;
            var new_input = '   <div class="input-group mb-3 mt-4" id="div_exclude_' + new_chq_no + '">' +
                '    <input type="text" class="form-control" placeholder="Hal yang tidak termasuk dalam layanan" name="layanan_exclude[]" aria-label="" aria-describedby="basic-addon1">' +
                '  <div class="input-group-prepend">' +
                '  <button class="btn btn-outline-danger" onclick="removeExclude(' + new_chq_no + ')" type="button">Hapus</button>' +
                ' </div>' +
                ' </div>';

            $('#new_exclude').append(new_input);

            $('#total_exclude').val(new_chq_no);
        }

        function removeExclude(param) {
            $('#div_exclude_' + param).remove();
        }


        function simpan() {
            var form_data = new FormData($('#form-data')[0]);

            form_data.append('syarat', $('#syarat').summernote('code'));

            Swal.fire({
                text: 'Sedang menyimpan ...',
                allowOutsideClick: false,
                onBeforeOpen: function () {
                    Swal.showLoading();
                }
            });

            $.post({
                url: '{{ route('master.tour.simpan.detail') }}',
                data: form_data,
                processData: false,
                contentType: false
            })
                .done(function (response) {
                    Swal.close();
                    if (response.success) {
                        swal_success('Berhasil menyimpan data produk');

                        $('#form-modal').modal('hide');

                        table_data.ajax.reload();
                    } else {
                        swal_error(response.message)
                    }
                }).fail(ajaxFail);
        }
    </script>
@endpush
