<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\User\UserHapusPermanenRequest;
use App\Http\Requests\Back\Master\User\UserHapusRequest;
use App\Http\Requests\Back\Master\User\UserPulihkanRequest;
use App\Http\Requests\Back\Master\User\UserSimpanRequest;
use Illuminate\Http\Request;

interface UserContract
{
    public function simpan(UserSimpanRequest $request);

    public function hapus(UserHapusRequest $request);

    public function hapusPermanen(UserHapusPermanenRequest $request);

    public function pulihkan(UserPulihkanRequest $request);

    public function getDaftarRole(Request $request);
}
