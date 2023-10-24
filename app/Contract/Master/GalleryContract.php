<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Gallery\SimpanGalleryRequest;
use App\Http\Requests\Back\Master\Gallery\HapusGalleryRequest;


interface GalleryContract
{
    public function simpan(SimpanGalleryRequest $request);

    public function hapus(HapusGalleryRequest $request);
}
