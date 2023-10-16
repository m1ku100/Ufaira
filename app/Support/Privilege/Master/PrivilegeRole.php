<?php

namespace App\Support\Privilege\Master;

use App\Support\Privilege\BasePrivilege;

class PrivilegeRole extends BasePrivilege
{
    public const MENAMBAH = 'Menambah Role';

    public const MENGUBAH_ROLE = 'Mengubah Role';

    public const MENGUBAH_AKSES = 'Mengubah Hak Akses Role';

    public const MENGHAPUS = 'Menghapus Role';

    public const MEGHAPUS_PERMANEN = 'Menghapus Permanen';
}
