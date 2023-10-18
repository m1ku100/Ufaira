<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\RentalContract;
use App\Contract\Master\TourContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Rental\RentalHapusPermanenRequest;
use App\Http\Requests\Back\Master\Rental\RentalHapusRequest;
use App\Http\Requests\Back\Master\Rental\RentalPulihkanRequest;
use App\Http\Requests\Back\Master\Rental\RentalSimpanRequest;
use App\Models\Master\Rental;
use App\Models\Master\Tour;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    protected $model_class = Rental::class;

    protected $rentalRepository;

    public function __construct(RentalContract $repository)
    {
        $this->rentalRepository = $repository;
    }


    public function index()
    {
        return view('page.back.master.rental.rental_index');
    }

    public function simpan(RentalSimpanRequest $request)
    {
        $response = $this->rentalRepository->simpan($request);

        return $this->compileResponse($response);
    }


    /**
     * Menghapus pengguna
     *
     * @param PenggunaHapusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapus(RentalHapusRequest $request)
    {
        $response = $this->rentalRepository->hapus($request);

        return $this->compileResponse($response);
    }

    /**
     * Memulihkan data pengguna
     *
     * @param PenggunaPulihkanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pulihkan(RentalPulihkanRequest $request)
    {
        $response = $this->rentalRepository->pulihkan($request);

        return $this->compileResponse($response);
    }

    /**
     * Menghapus permanen data pengguna
     *
     * @param PenggunaHapusPermanenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapusPermanent(RentalHapusPermanenRequest $request)
    {
        $response = $this->rentalRepository->hapusPermanen($request);

        return $this->compileResponse($response);
    }
}
