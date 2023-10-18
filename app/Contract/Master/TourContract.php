<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Tour\TourHapusPermanenRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusRequest;
use App\Http\Requests\Back\Master\Tour\TourPulihkanRequest;
use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;

interface TourContract
{
    public function simpan(TourSimpanRequest $request);

    public function hapus(TourHapusRequest $request);

    public function hapusPermanen(TourHapusPermanenRequest $request);

    public function pulihkan(TourPulihkanRequest $request);
}
