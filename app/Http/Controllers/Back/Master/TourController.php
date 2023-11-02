<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\TourContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Tour\SimpanTourDetailRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusPermanenRequest;
use App\Http\Requests\Back\Master\Tour\TourHapusRequest;
use App\Http\Requests\Back\Master\Tour\TourPulihkanRequest;
use App\Http\Requests\Back\Master\Tour\TourSimpanRequest;
use App\Models\Master\Gallery;
use App\Models\Master\Tour;
use Illuminate\Http\Request;

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


    public function detailTour(Request $request)
    {
        $tour = Tour::query()->find($request->uuid_tour);

        if (empty($tour)) {
            abort(404);
        }

        return view('page.back.master.tour.detail.detail_form',[
            'data' => $tour
        ]);
    }


    public function simpanDetail(SimpanTourDetailRequest $request)
    {
        $response = $this->tourRepository->simpanTourDetail($request);

        return $this->compileResponse($response);

    }

    public function getGambarGallery(Request $request)
    {
        $uuid_tour_detail	=	$request->uuid_tour_detail;
        $getData		    =	Gallery::select('gambar_gallery')->where('uuid_tour_detail', $uuid_tour_detail)->get();

        return response()->json([
            'success' => true,
            'data'	=>	$getData,
        ]);
    }
}
