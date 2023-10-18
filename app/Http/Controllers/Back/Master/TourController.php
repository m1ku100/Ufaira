<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\TourContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Tour\TourHapusPermanenRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusRequest;
use App\Http\Requests\Back\Master\Tour\TourPulihkanRequest;
use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;
use App\Models\Master\Tour;

class TourController extends Controller
{
    protected $model_class = Tour::class;

    protected $tourRepository;

    public function __construct(TourContract $repository)
    {
        $this->tourRepository = $repository;
    }

    public function index()
    {
        return view('page.back.master.tour.tour_index');
    }

    public function simpan(TourSimpanRequest $request)
    {
        $response = $this->tourRepository->simpan($request);

        return $this->compileResponse($response);
    }


    /**
     * Menghapus pengguna
     *
     * @param PenggunaHapusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapus(TourHapusRequest $request)
    {
        $response = $this->tourRepository->hapus($request);

        return $this->compileResponse($response);
    }

    /**
     * Memulihkan data pengguna
     *
     * @param PenggunaPulihkanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pulihkan(TourPulihkanRequest $request)
    {
        $response = $this->tourRepository->pulihkan($request);

        return $this->compileResponse($response);
    }

    /**
     * Menghapus permanen data pengguna
     *
     * @param PenggunaHapusPermanenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapusPermanent(TourHapusPermanenRequest $request)
    {
        $response = $this->tourRepository->hapusPermanen($request);

        return $this->compileResponse($response);
    }

}
