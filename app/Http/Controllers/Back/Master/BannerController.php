<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\BannerContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Banner\SimpanBannerRequest;
use App\Http\Requests\Back\Master\Banner\HapusBannerRequest;
use App\Models\Master\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $model_class = Banner::class;

    protected $banner_repository;

    public function __construct(BannerContract $repository)
    {
        $this->banner_repository = $repository;
    }

    public function index()
    {
        return view('page.back.master.banner.banner_index');
    }

    public function simpan(SimpanBannerRequest  $request)
    {
        $response = $this->banner_repository->simpan($request);

        return $this->compileResponse($response);
    }

    public function hapus(HapusBannerRequest $request)
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
        return response()->json(Banner::all());
    }
}
