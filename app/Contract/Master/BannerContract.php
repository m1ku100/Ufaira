<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Banner\HapusBannerRequest;
use App\Http\Requests\Back\Master\Banner\SimpanBannerRequest;
use App\Http\Requests\Back\Master\Banner\SimpanGalleryRequest;
use App\Http\Requests\Back\Master\Banner\HapusGalleryRequest;


interface BannerContract
{
    public function simpan(SimpanBannerRequest $request);

    public function hapus(HapusBannerRequest $request);
}
