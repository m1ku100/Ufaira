<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\RoleContract;
use App\Http\Requests\Back\Master\Role\RoleHapusRequest;
use App\Http\Requests\Back\Master\Role\RoleSimpanRequest;
use App\Models\Master\Role;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class RoleRepository extends BaseRepository implements RoleContract
{
    public function simpan(RoleSimpanRequest $request)
    {
       $data = $request->getData();

        $model = app(Role::class);

        $response = $model->simpan($request->role, $data);

        if ($response !== true) {
            return $this->errorResponse('Gagal menyimpan data', $response);
        }

        return $this->successResponse();
    }

    public function hapus(RoleHapusRequest $request)
    {
        // TODO: Implement hapus() method.
    }

    public function getDaftarMenu(Request $request)
    {
        $model = app(Role::class);

        $response = $model->getDaftarMenu($request);

        return $response;
    }

    public function getDaftarMenuAkses(Request $request)
    {
        $model = app(Role::class);

        $response = $model->getDaftarMenuAkses($request);

        return $response;
    }

    public function simpanAksesMenu(Request $request)
    {
        $model = app(Role::class);

        $response = $model->simpanAksesMenu($request);

        if ($response !== true) {
            return $this->errorResponse('Gagal menyimpan data', $response);
        }

        return $this->successResponse();
    }
}
