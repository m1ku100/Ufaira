<form method="post" enctype="multipart/form-data" id="form-add-banner">

    @csrf

    <div class="form-group">
        <label for="kode_produk">Upload Gambar</label>
        <x-input-image :base64="false" id="gambar_banner" name="gambar_banner"></x-input-image>
    </div>

    <div class="form-group">
        <label for="kode_produk">Link</label>
        <x-input-text id="link_banner" name="link_banner"></x-input-text>
    </div>

    <div class="form-group d-none">
        <label for="kode_produk">Judul Banner</label>
        <x-input-text id="judul_banner" name="judul_banner"></x-input-text>
    </div>

    <div class="form-group">
        <label for="kode_produk">Sub Judul Banner</label>
        <x-input-text id="sub_judul_banner" name="sub_judul_banner"></x-input-text>
    </div>

    <div class="form-group">
        <button class="btn btn-success" @click="simpanBanner()">Simpan</button>
    </div>
</form>
