<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\BannerContract;
use App\Contract\Master\GalleryContract;
use App\Http\Requests\Back\Master\Gallery\SimpanGalleryRequest;
use App\Http\Requests\Back\Master\Gallery\HapusGalleryRequest;

use App\Models\Master\Banner;
use App\Models\Master\Gallery;
use App\Repositories\BaseRepository;

class GalleryRepository extends BaseRepository implements GalleryContract
{
    public function simpan(SimpanGalleryRequest $request)
    {
        $data = $request->getData();

        $model = app(Gallery::class);

        $response = $model->simpan($data);

        if ($response !== true) {
            return $this->errorResponse('Gagal menyimpan Banner', $response);
        }

        return $this->successResponse();
    }

    public function hapus(HapusGalleryRequest $request)
    {
        $file = $request->gallery->gambar_gallery;

        $response = $request->gallery->hapus();

        $request->deleteFile(public_path('assets/images/gallery/' . $file), true);

        if ($response !== true) {
            return $this->errorResponse('Gagal menghapus Banner', $response);
        }

        return $this->successResponse();
    }
}
