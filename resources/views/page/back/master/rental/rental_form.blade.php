<form id="form-data">

    <input type="hidden" name="mode" id="mode">
    <input type="hidden" name="uuid_rental" id="uuid_rental">

    <div class="form-divider">
        Data Rental
    </div>


    <div class="form-group">
        <label for="nama_treatment">Nama Kendaraan</label>
        <x-input-text id="nama_kendaraan" name="nama_kendaraan" placeholder="Nama Kendaraan"></x-input-text>
    </div>

    <div class="form-group">
        <label for="harga_treatment">Harga</label>
        <x-input-number id="harga" name="harga" placeholder="Harga per Hari"></x-input-number>
    </div>

    <div class="form-group">
        <label for="harga_treatment">Batas Maksimal Penumpang </label>
        <x-input-number id="min_pax" name="min_pax" placeholder="Maksimum Penumpang"></x-input-number>
    </div>

    <div class="row">
        <div class="form-group col-12">
            <label for="pakai_resep_produk">Transmisi</label>
            <div class="card border">
                <div class="card-body border-bottom p-3">
                    <x-input-radio class="pakai_resep_produk" id="ya" name="is_automatic" value="1" label="Automatic"></x-input-radio>
                </div>
                <div class="card-body p-3">
                    <x-input-radio class="pakai_resep_produk" id="tidak" name="is_automatic" value="0" label="Manual"></x-input-radio>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-12">
            <label for="is_include_supir">Biaya Termasuk Supir</label>
            <div class="card border">
                <div class="card-body border-bottom p-3">
                    <x-input-radio class="is_include_supir" id="is_include_supir_pakai" name="is_include_supir" value="1" label="Pakai"></x-input-radio>
                </div>
                <div class="card-body p-3">
                    <x-input-radio class="is_include_supir" id="is_include_supir_tidak" name="is_include_supir" value="0" label="Tidak"></x-input-radio>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="gambar_treatment">Gambar</label>
        <x-input-image :base64="false" name="foto" id="foto"></x-input-image>
    </div>


</form>
