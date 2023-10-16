<form id="form-data" class="p-3">

    <input type="hidden" name="mode" id="mode">
    <input type="hidden" name="uuid_pengguna" id="uuid_pengguna">

    <div class="form-group row">
        <label for="kode_pengguna">Kode Pengguna</label>
        <x-input-text id="kode_pengguna" name="kode_pengguna" placeholder="Kode Pengguna" :readonly="true"></x-input-text>
    </div>

    <div class="form-group row">
        <label for="email_pengguna">Email</label>
        <x-input-email id="email_pengguna" name="email_pengguna" placeholder="Email"></x-input-email>
    </div>

    <div class="form-group row">
        <label for="nama_pengguna">Nama</label>
        <x-input-text id="nama_pengguna" name="nama_pengguna" placeholder="Nama Lengkap"></x-input-text>
    </div>

    <div class="form-group row">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div class="form-group row">
        <label for="password">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <div class="form-group row">
        <label for="role">Role Pengguna</label>
        <select name="role[]" id="role" multiple="multiple" class="custom-select d-block" style="width: 100%"></select>
    </div>

</form>
