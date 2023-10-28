@php
    use App\Models\Master\User;
@endphp

@extends('layout.back.back_main')

@section('title', 'Detail Tour')

@section('page-title', 'Detail Tour')

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
                                <label for="min_pax">Maximum Pax dalam 1 Paket</label>
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

                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <label class="card-title">Syarat & Ketentuan Tour <small>(Bila ada)</small></label>
                        <div class="summernote" id="catatan_karir">

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

        });


    </script>
@endpush
