<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\UserContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\User\UserHapusPermanenRequest;
use App\Http\Requests\Back\Master\User\UserHapusRequest;
use App\Http\Requests\Back\Master\User\UserPulihkanRequest;
use App\Http\Requests\Back\Master\User\UserSimpanRequest;
use App\Models\Master\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model_class = User::class;

    protected $penggunaRepository;

    public function __construct(UserContract $repository)
    {
        $this->penggunaRepository = $repository;
    }

    /**
     * Menampilkan halaman master pengguna
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('page.back.master.user.user_index');
    }

    /**
     * Menyimpan data pengguna
     *
     * @param PenggunaSimpanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function simpan(UserSimpanRequest $request)
    {
        $response = $this->penggunaRepository->simpan($request);

        return $this->compileResponse($response);
    }

    /**
     * Mendapatkan daftar role dari pengguna terkait
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function daftarRole(Request $request)
    {
        $request->validate([
            'uuid_pengguna'	=> 'required|uuid|exists:m_pengguna,uuid_pengguna'
        ]);

        $response = $this->penggunaRepository->getDaftarRole($request);

        return $this->sendSuccessResponse('ditemukan',$response);
    }

    /**
     * Menghapus pengguna
     *
     * @param PenggunaHapusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapus(UserHapusRequest $request)
    {
        $response = $this->penggunaRepository->hapus($request);

        return $this->compileResponse($response);
    }

    /**
     * Memulihkan data pengguna
     *
     * @param PenggunaPulihkanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pulihkan(UserPulihkanRequest $request)
    {
        $response = $this->penggunaRepository->pulihkan($request);

        return $this->compileResponse($response);
    }

    /**
     * Menghapus permanen data pengguna
     *
     * @param PenggunaHapusPermanenRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hapusPermanen(UserHapusPermanenRequest $request)
    {
        $response = $this->penggunaRepository->hapusPermanen($request);

        return $this->compileResponse($response);
    }
}
