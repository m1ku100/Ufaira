<?php

namespace App\Repositories\Back\Master;

use App\Contract\Master\UserContract;
use App\Http\Requests\Back\Master\User\UserHapusPermanenRequest;
use App\Http\Requests\Back\Master\User\UserHapusRequest;
use App\Http\Requests\Back\Master\User\UserPulihkanRequest;
use App\Http\Requests\Back\Master\User\UserSimpanRequest;
use App\Models\Master\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserContract
{
    public function simpan(UserSimpanRequest $request)
    {
        $data = $request->getData();

        $model = app(User::class);

        $response = $model->simpan($request->pengguna, $data);

        if ($response !== true) {
            return $this->errorResponse('Gagal Menyimpan Pengguna', $response);
        }

        return $this->successResponse();
    }

    public function hapus(UserHapusRequest $request)
    {
        $response = $request->pengguna->hapus();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }

    public function hapusPermanen(UserHapusPermanenRequest $request)
    {
        $response = $request->pengguna->hapusPermanen();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }

    public function pulihkan(UserPulihkanRequest $request)
    {
        $response = $request->pengguna->pulihkan();

        if ($response !== true) {
            return $this->errorResponse('Gagal Menghapus Blog', $response);
        }

        return $this->successResponse();
    }

    public function getDaftarRole(Request $request)
    {
        $pengguna = User::query()->find($request->uuid_pengguna);

        $daftar_role = $pengguna->getRole(false);

        return $daftar_role;
    }
}
