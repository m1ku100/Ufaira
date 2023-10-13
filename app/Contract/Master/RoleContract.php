<?php

namespace App\Contract\Master;

use App\Http\Requests\Back\Master\Role\RoleHapusRequest;
use App\Http\Requests\Back\Master\Role\RoleSimpanRequest;
use Illuminate\Http\Request;

interface RoleContract
{
    public function simpan(RoleSimpanRequest $request);

    public function hapus(RoleHapusRequest $request);

    public function simpanAksesMenu(Request $request);

    public function getDaftarMenu(Request $request);

    public function getDaftarMenuAkses(Request $request);
}
