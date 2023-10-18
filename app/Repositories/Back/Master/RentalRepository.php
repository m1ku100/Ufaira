<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\RentalContract;
use App\Contract\Master\TourContract;
use App\Http\Requests\Back\Master\Rental\RentalHapusPermanenRequest;
use App\Http\Requests\Back\Master\Rental\RentalHapusRequest;
use App\Http\Requests\Back\Master\Rental\RentalPulihkanRequest;
use App\Http\Requests\Back\Master\Rental\RentalSimpanRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusPermanenRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusRequest;
use App\Http\Requests\Back\Master\Tour\TourPulihkanRequest;
use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;
use App\Models\Master\Rental;
use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Repositories\BaseRepository;

class RentalRepository extends BaseRepository implements RentalContract
{
    public function simpan(RentalSimpanRequest $request)
    {
        $data = $request->getData();

        $model = app(Rental::class);

        $response = $model->simpan($request->rental, $data);

        if ($response !== true) {
            return $this->errorResponse('Gagal Menyimpan Tour', $response);
        }

        return $this->successResponse();
    }

    public function hapus(RentalHapusRequest $request)
    {
        $response = $request->rental->hapus();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }

    public function pulihkan(RentalPulihkanRequest $request)
    {
        $response = $request->rental->pulihkan();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }

    public function hapusPermanen(RentalHapusPermanenRequest $request)
    {
        $response = $request->rental->hapusPermanen();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }
}
