<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\BannerContract;
use App\Contract\Master\GalleryContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Gallery\SimpanGalleryRequest;
use App\Http\Requests\Back\Master\Gallery\HapusGalleryRequest;
use App\Models\Master\Banner;
use App\Models\Master\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $model_class = Banner::class;

    protected $banner_repository;

    public function __construct(GalleryContract $repository)
    {
        $this->banner_repository = $repository;
    }

    public function index()
    {
        return view('page.back.master.gallery.gallery_index');
    }

    public function simpan(SimpanGalleryRequest $request)
    {
        $response = $this->banner_repository->simpan($request);

        return $this->compileResponse($response);
    }

    public function hapus(HapusGalleryRequest $request)
    {
        $response = $this->banner_repository->hapus($request);

        return $this->compileResponse($response);
    }

    /**
     * Mendapatkan daftar banner
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return response()->json(Gallery::all());
    }
}
