<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\BannerContract;
use App\Http\Requests\Back\Master\Banner\HapusBannerRequest;
use App\Http\Requests\Back\Master\Banner\SimpanBannerRequest;
use App\Http\Requests\Back\Master\Banner\SimpanGalleryRequest;
use App\Http\Requests\Back\Master\Banner\HapusGalleryRequest;

use App\Models\Master\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository implements BannerContract
{
    public function simpan(SimpanBannerRequest $request)
    {
        $data = $request->getData();

        $model = app(Banner::class);

        $response = $model->simpan($data);

        if ($response !== true) {
            return $this->errorResponse('Gagal menyimpan Banner', $response);
        }

        return $this->successResponse();
    }

    public function hapus(HapusBannerRequest $request)
    {
        $file = $request->banner->gambar_banner;

        $response = $request->banner->hapus();

        $request->deleteFile(public_path('assets/images/banner/' . $file), true);

        if ($response !== true) {
            return $this->errorResponse('Gagal menghapus Banner', $response);
        }

        return $this->successResponse();
    }
}
