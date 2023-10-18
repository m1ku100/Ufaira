<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\TourContract;
use App\Http\Controllers\Controller;
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
}
