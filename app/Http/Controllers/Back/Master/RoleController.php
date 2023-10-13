<?php

namespace App\Http\Controllers\Back\Master;

use App\Contract\Master\RoleContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Master\Role\RoleHapusRequest;
use App\Http\Requests\Back\Master\Role\RoleSimpanRequest;
use App\Models\Master\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $model_class = Role::class;

    protected $roleRepository;

    public function __construct(RoleContract $repository)
    {
        $this->roleRepository = $repository;
    }

    /**
     * Menampilkan halaman menu role
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $daftar_role = Role::all();

        return view('page.back.master.role.role_index', [
            'daftar_role' => $daftar_role,
        ]);
    }

    public function simpanRole(RoleSimpanRequest $request)
    {
        $response = $this->roleRepository->simpan($request);

        return $this->compileResponse($response);
    }

    public function hapus(RoleHapusRequest $request)
    {
        $response = $this->roleRepository->hapus($request);

        return $this->compileResponse($response);
    }

    public function simpanAksesMenu(Request $request)
    {
        $response = $this->roleRepository->simpanAksesMenu($request);

        return $this->compileResponse($response);
    }

    public function getDaftarMenu(Request $request)
    {
        $response = $this->roleRepository->getDaftarMenu($request);

        return $this->sendSuccessResponse('Ditemukan',$response);
    }

    public function getDaftarMenuAkses(Request $request)
    {
        $response = $this->roleRepository->getDaftarMenuAkses($request);

        return $this->sendSuccessResponse('Ditemukan',$response);
    }
}
