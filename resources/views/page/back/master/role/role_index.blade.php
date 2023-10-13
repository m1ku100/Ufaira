@php
    use App\Models\Master\Role;
@endphp

@extends('layout.back.back_main')

@section('title', 'Master Role')

@push('head')
    <style>
        .card-role .nav-pills .nav-link {
            border-radius: 0;
        }

        .card-role .nav-link:hover {
            background-color: var(--light);
        }

        .card-role .nav-link {
            cursor: pointer;
            border-bottom: 1px solid #dddddd;
        }

        .card-role .nav-link.active {
            background-color: #c3d3de;
            color: var(--primary);
            font-weight: bold;
        }
    </style>
@endpush

@section('page-title', 'Master Role')

@push('header-tools')
    @can('create', Role::class)
        <button class="btn btn-success btn-tambah" onclick="tambah()" title="Tambah Produk">Tambah Role</button>
    @endcan
@endpush

@section('content')
    <div class="card card-role" id="app">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 p-0 border">
                    <h5 class="bg-secondary p-2">Daftar Role</h5>

                    <nav class="nav flex-column nav-pills">
                        <div v-for="role in daftar_role"
                             :class="['d-flex', 'justify-content-between', 'align-items-center', 'nav-link', {'active': selected_role == role}]"
                             href="#" @click="ubah_role_aktif(role)">
                            @{{ role.nama_role }}

                            <div class="btn-group">
                                @can('update', Role::class)
                                    <button class="btn btn-sm btn-primary" @click="before_show(role)">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                @endcan
                                @can('delete', Role::class)
                                    <button class="btn btn-sm btn-danger" @click="before_hapus(role)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                @endcan
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-4 p-0 border">
                    <h5 class="bg-secondary p-2">Daftar Menu</h5>

                    <nav class="nav flex-column nav-pills">
                        <div v-for="menu in daftar_menu" :class="['nav-link', {'active': selected_menu == menu}]"
                             href="#" @click="ubah_menu_aktif($event, menu)">
                            <div class="row justify-content-between">
                                <div class="col-lg-8">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" :id="menu.uuid_menu"
                                               v-model="menu.akses" @change="sinkronisasi(menu)">
                                        <label class="custom-control-label" :for="menu.uuid_menu">@{{
                                            menu.nama_tampilan_menu }}</label>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <input type="text" class="form-control form-control-sm" v-model="menu.urutan_menu"
                                           @change="sinkronisasi(menu)">
                                </div>
                            </div>
                        </div>
                    </nav>

                    <p v-if="daftar_menu.length == 0" class="alert alert-info m-2 text-center">
                        Pilih role untuk menampilkan daftar menu
                    </p>
                </div>
                <div class="col-lg-4 p-0 border">
                    <h5 class="bg-secondary p-2">Hak Akses</h5>

                    <nav class="nav flex-column nav-pills">
                        <div v-for="menu_akses in daftar_menu_akses" class="nav-link" href="#">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" :id="menu_akses.uuid_menu_akses"
                                       v-model="menu_akses.akses" @change="sinkronisasi(selected_menu)">
                                <label class="custom-control-label" :for="menu_akses.uuid_menu_akses">@{{
                                    menu_akses.nama_akses }}</label>
                            </div>
                        </div>
                    </nav>

                    <p v-if="daftar_menu_akses.length == 0" class="alert alert-info m-2 text-center">
                        Pilih menu untuk menampilkan daftar hak akses
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('misc')
    <x-modal id="form-modal" size="md" title="Tambah Role">
        @include('page.back.master.role.role_modal')

        <x-slot name="footer">
            <button onclick="before_simpan()" class="btn btn-success">Simpan</button>
        </x-slot>
    </x-modal>
@endpush

@push('js')
    <script>
        let app = new Vue({
            el: '#app',

            data: {
                daftar_role: @json($daftar_role),
                daftar_menu: [],
                daftar_menu_akses: [],
                selected_role: null,
                selected_menu: null
            },

            methods: {
                ubah_role_aktif(role) {
                    let that = this;

                    this.selected_role = role;

                    $.post('{{ route('master.role.data.daftar.menu') }}', {
                        uuid_role: role.uuid_role
                    }).done(function (response) {
                        that.daftar_menu = response.data;
                        that.daftar_menu_akses = [];
                    })
                },

                ubah_menu_aktif(event, menu) {
                    let that = this;
                    let el = $(event.target);

                    if (el.hasClass('custom-control-input')) {
                        return false;
                    }

                    this.selected_menu = menu;

                    $.post('{{ route('master.role.data.daftar.menu.akses') }}', {
                        uuid_role: that.selected_role.uuid_role,
                        uuid_menu: menu.uuid_menu
                    }).done(function (response) {
                        that.daftar_menu_akses = response.data
                    })
                },

                sinkronisasi(menu) {
                    var role = this.selected_role;
                    var daftar_akses = this.daftar_menu_akses;

                    if (menu.akses) {
                        // nothing
                    } else {
                        if (this.selected_menu.uuid_menu == menu.uuid_menu) {
                            daftar_akses.map(function (item) {
                                item.akses = false;
                            })
                        }
                    }

                    $.post('{{ route('master.role.simpan.akses') }}', {
                        menu, role, daftar_akses
                    }).done(function (response) {
                        if (!response.success) {
                            swal_error(response.message);
                        }
                    }).fail(ajaxFail);
                },

                before_show(role) {
                    $('#form-modal').modal('show');
                    $('#form-data').loadValue(role);
                    $('#mode').val('ubah');
                },

                before_hapus(role) {
                    let that = this;

                    swal_confirm('Anda menghapus role ' + role.nama_role)
                        .then(function (response) {
                            if (response.value) {
                                that.hapus(role);
                            }
                        })
                },

                hapus(role) {
                    $.post('{{ route('master.role.hapus') }}', {
                        uuid_role: role.uuid_role
                    }).then(function (response) {
                        if (response.success) {
                            swal_success('Berhasil menghapus role ' + role.nama_role);

                            window.location.reload();
                        } else {
                            swal_error(response.message);
                        }
                    }).fail(ajaxFail);
                }
            }
        })

        function tambah() {
            $('#form-modal').modal('show');
            $('#form-data').trigger('reset');
            $('#mode').val('tambah');
        }

        function before_simpan(e) {
            var form_data = $('#form-data').serializeArray();

            showLoader('Sedang menyimpan ...');

            $.post('{{ route('master.role.simpan.role') }}', form_data)
                .done(function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Berhasil menyimpan data role'
                        });

                        window.location.reload();

                        $('#form-modal').modal('hide');
                    }
                }).fail(ajaxFail)
        }
    </script>
@endpush
