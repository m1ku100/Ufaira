<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\TourContract;
use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;
use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Repositories\BaseRepository;

class TourRepository extends BaseRepository implements TourContract
{
    public function simpan(TourSimpanRequest $request)
    {
        $data = $request->getData();

        $model = app(Tour::class);

        $response = $model->simpan($request->tour, $data);

        if ($response !== true) {
            return $this->errorResponse('Gagal Menyimpan Tour', $response);
        }

        return $this->successResponse();
    }
}
