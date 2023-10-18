@php
    use App\Models\Master\Tour;
@endphp

@extends('layout.back.back_main')

@section('title', 'Master Tour')

@section('page-title', 'Master Tour')

@push('header-tools')
    @can('create', Tour::class)
        <button class="btn btn-success btn-tambah" title="Tambah" onclick="tambah()">Tambah Tour</button>
    @endcan
@endpush

@section('content')

    <div class="card">

        <div class="card-body pl-0 pr-0">
            <table id="tabledata" class="table table-striped dt-responsive m-0" style="width: 100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('misc')
    <x-modal id="form-modal" size="xl" title="Pengguna">
        @include('page.back.master.tour.tour_index')

        <x-slot name="footer">
            <button onclick="before_simpan()" class="btn btn-success" id="btn-simpan">Simpan</button>
        </x-slot>
    </x-modal>
@endpush

@push('js')
    <script>

        let table_data_element = $('#tabledata');
        let table_data = null;

        $(function () {
            table_data_element.DataTable({
                serverSide: true,
                processing: true,
                lengthChange: false,
                pageLength: 10,
                paging: true,
                ordering: false,
                ajax: {
                    url: '{{ route('master.pengguna.data.table') }}',
                    type: 'POST',
                    dataSrc: 'data'
                },
                columns: [
                    {
                        data: ''
                    },
                    {
                        data: 'nama_pengguna'
                    },
                    {
                        data: 'email_pengguna'
                    },
                    {
                        data: 'status_pengguna',
                        render: function (data, type, full, meta) {
                            let badge_status = {
                                I : {
                                    class :'badge-success',
                                    text  : 'Aktif'
                                },
                                B : {
                                    class :'badge-warning',
                                    text  : 'Diblokir'
                                },
                                D: {
                                    class: 'badge-danger',
                                    text: 'Dihapus'
                                }
                            };

                            let el = $('<span></span>')
                                .addClass('badge')
                                .addClass(badge_status[data].class)
                                .text(badge_status[data].text);

                            return el.prop('outerHTML');
                        }
                    }
                ],
                columnDefs: [{
                    targets: 0,
                    data: null,
                    render: function (data, type, full, meta) {
                        let btn_group = $('<div></div>').addClass('btn-group btn-group-sm');
                        let btn_show = create_table_btn('Tampilkan', 'btn btn-primary btn-show', 'far fa-eye');
                        let btn_hapus = create_table_btn('Hapus', 'btn btn-danger btn-hapus', 'fas fa-trash');
                        let btn_pulih = create_table_btn('Pulihkan', 'btn btn-success btn-pulih', 'fas fa-trash');
                        let btn_hapus_permanen = create_table_btn('Hapus Permanen', 'btn btn-outline-danger btn-hapus-permanen', 'fas fa-trash');

                        btn_group.append(btn_show);

                        @can('delete', User::class)
                        if (full.status_pengguna != 'D') {
                            btn_group.append(btn_hapus);
                        }
                        @endcan

                            @can('restore', User::class)
                        if (full.status_pengguna == 'D') {
                            btn_group.append(btn_pulih);
                        }
                        @endcan

                            @can('forceDelete', User::class)
                        if (full.status_pengguna == 'D') {
                            btn_group.append(btn_hapus_permanen);
                        }
                        @endcan

                            return btn_group.prop('outerHTML');
                    }
                }],
                createdRow: function(row, data, dataIndex) {
                    if (data.status_pengguna == 'D') {
                        $(row).addClass('bg-danger-light');
                    }
                }
            })

            table_data = table_data_element.DataTable();

            table_data_element.on('click', 'button.btn-show', before_show);
            table_data_element.on('click', 'button.btn-hapus', before_hapus);
            table_data_element.on('click', 'button.btn-pulih', before_pulihkan);
            table_data_element.on('click', 'button.btn-hapus-permanen', before_hapus_permanen);

            $('#role').select2({
                multiple: true,
                ajax: {
                    url: '{{ route('master.role.data.select') }}'
                }
            })
        });

        function tambah(e) {
            $('#mode').val('tambah');

            $('#form-modal').trigger('reset');

            $('#role').val(null).trigger('change');

            $('#form-modal').modal('show');

            enable_simpan();
        }

        function before_show(e) {
            let data = getTableData(e);

            $('#mode').val('ubah');

            $('#form-modal').trigger('reset');

            $('#form-modal').modal('show');

            $('#form-modal form').loadValue(data);

            $('#role').val(null).trigger('change');

            load_daftar_role(data.uuid_pengguna);

            if (data.status_pengguna == 'D') {
                disable_simpan();
            }

            @cannot('update', User::class)
            disable_simpan();
            @endcannot
        }

        function load_daftar_role(uuid_pengguna) {
            $.post('{{ route('master.pengguna.daftar.role') }}', {
                uuid_pengguna: uuid_pengguna
            }).done(function (response) {
                if (response.success) {
                    var selected = [];

                    response.data.map(function (item) {
                        $('#role').append(`<option selected='selected' value="${item.uuid_role}">${item.nama_role}</option>`);
                    });
                }
            }).fail(ajaxFail)
        }

        function before_simpan(e) {
            var form_data = $('#form-data').serializeArray();

            showLoader('Sedang menyimpan ...');

            $.post('{{ route('master.tour.simpan') }}', form_data)
                .done(function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Berhasil menyimpan data penguna'
                        });

                        table_data.ajax.reload();

                        $('#form-modal').modal('hide');
                    }
                }).fail(ajaxFail)
        }

        function before_hapus(e) {
            let data = getTableData(e);

            swal_confirm('Anda akan menghapus pengguna ' + data.nama_pengguna)
                .then(function (response) {
                    if (response.value) {
                        hapus(data);
                    }
                });
        }

        function hapus(data) {
            showLoader('Sedang memproses ...');

            $.post('{{ route('master.pengguna.hapus') }}', {
                uuid_pengguna: data.uuid_pengguna
            }).done(function (response) {
                if (response.success) {
                    swal_success('Berhasil menghapus pengguna ' + data.nama_pengguna);

                    table_data.ajax.reload();
                }
            }).fail(ajaxFail);
        }

        function before_pulihkan(e) {
            let data = getTableData(e);

            swal_confirm('Anda akan memulihkan pengguna ' + data.nama_pengguna)
                .then(function (response) {
                    if (response.value) {
                        pulihkan(data);
                    }
                });
        }

        function pulihkan(data) {
            showLoader('Sedang memproses ...');

            $.post('{{ route('master.pengguna.pulihkan') }}', {
                uuid_pengguna: data.uuid_pengguna
            }).done(function (response) {
                if (response.success) {
                    swal_success('Berhasil memulihkan pengguna ' + data.nama_pengguna);

                    table_data.ajax.reload();
                }
            }).fail(ajaxFail);
        }

        function before_hapus_permanen(e) {
            let data = getTableData(e);

            swal_confirm('Anda akan menghapus permanen pengguna ' + data.nama_pengguna)
                .then(function (response) {
                    if (response.value) {
                        hapus_permanen(data);
                    }
                });
        }

        function hapus_permanen(data) {
            showLoader('Sedang memproses ...');

            $.post('{{ route('master.pengguna.hapus.permanen') }}', {
                uuid_pengguna: data.uuid_pengguna
            }).done(function (response) {
                if (response.success) {
                    swal_success('Berhasil menghapus permanen pengguna ' + data.nama_pengguna);

                    table_data.ajax.reload();
                }
            }).fail(ajaxFail);
        }
    </script>
@endpush
