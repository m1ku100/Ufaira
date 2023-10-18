<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Rental\RentalHapusPermanenRequest;
use App\Http\Requests\Back\Master\Rental\RentalHapusRequest;
use App\Http\Requests\Back\Master\Rental\RentalPulihkanRequest;
use App\Http\Requests\Back\Master\Rental\RentalSimpanRequest;

interface RentalContract
{
    public function simpan(RentalSimpanRequest $request);

    public function hapus(RentalHapusRequest $request);

    public function hapusPermanen(RentalHapusPermanenRequest $request);

    public function pulihkan(RentalPulihkanRequest $request);
}
