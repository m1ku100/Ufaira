<form method="post" enctype="multipart/form-data" id="form-edit-banner">

    @csrf
    <input type="hidden" id="uuid_banner" name="uuid_banner">
    <input type="hidden" id="foto_lama" name="foto_lama">

    <div class="form-group">
        <label for="kode_produk">Upload Gambar</label>
        <x-input-image :base64="false" id="gambar_banner_edit" name="gambar_banner"></x-input-image>
    </div>


    <div class="form-group d-none">
        <label for="kode_produk">Link</label>
        <x-input-text id="link_banner_edit" name="link_banner"></x-input-text>
    </div>

    <div class="form-group">
        <label for="kode_produk">Judul Banner</label>
        <x-input-text id="judul_banner_edit" name="judul_banner"></x-input-text>
    </div>

    <div class="form-group">
        <label for="kode_produk">Sub Judul Banner</label>
        <x-input-text id="sub_judul_banner_edit" name="sub_judul_banner"></x-input-text>
    </div>

    <div class="form-group">
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</form>
