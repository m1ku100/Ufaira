<?php

namespace App\Http\Controllers\Back\Utilities;

use App\Contract\Utilities\PreferensiContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Utilities\Preferensi\PreferensiRequest;
use App\Models\Master\Preferensi;
use Illuminate\Http\Request;

class PreferensiController extends Controller
{
    protected $model_class = Preferensi::class;

    protected $preferensi_repository;

    public function __construct(PreferensiContract $repository)
    {
        $this->preferensi_repository = $repository;
    }

    public function index(Request $request)
    {
        $daftar_preferensi = app(Preferensi::class)->getDaftarPreferensi($request->induk);

        $count = $daftar_preferensi->count();

        $chunk_count = ceil($count / 2);

        return view('page.back.utilities.preferensi.preferensi_index', [
            'daftar_preferensi' => $daftar_preferensi->chunk($chunk_count)
        ]);
    }

    public function simpan(PreferensiRequest $request)
    {
        $response = $this->preferensi_repository->simpan($request);

        return $this->compileResponse($response);
    }
}
