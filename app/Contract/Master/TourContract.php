<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;

interface TourContract
{
    public function simpan(TourSimpanRequest $request);
}
