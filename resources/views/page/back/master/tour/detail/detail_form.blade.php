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
                                <label for="email_pengguna">Harga per Pax</label>
                                <x-input-text id="email_pengguna" name="email_pengguna"
                                               placeholder="Email"></x-input-text>
                            </div>
                            <div class="col-3">
                                <label for="email_pengguna">Maximum Pax dalam 1 Paket</label>
                                <x-input-text id="email_pengguna" name="email_pengguna"
                                               placeholder="Email"></x-input-text>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Penayangan Karir</h5>
                        <div class="row">
                            <div class="form-group col-12">
                                <input type="text" id="start_waktu_tayang" name="start_waktu_tayang">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kualifikasi</h5>
                        <div class="summernote" id="kualifikasi_karir">


                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi Posisi <small>(hak & kewajiban)</small></h5>
                        <div class="summernote" id="deskripsi_karir">

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Catatan <small>(Bila ada)</small></h5>
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
