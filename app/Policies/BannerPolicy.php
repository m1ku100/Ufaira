<?php

namespace App\Policies;

use App\Models\Master\Banner;
use App\Models\Master\User;
use App\Support\Privilege\Profile\PrivilegeBanner;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if ($user->doesntHavePermission(PrivilegeBanner::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Banner');
        }

        return $this->allow();
    }

    public function update(User $user,Banner $Banner = null)
    {
        if ($user->doesntHavePermission(PrivilegeBanner::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Banner');
        }

        return $this->allow();
    }

    public function delete(User $user,Banner $Banner = null)
    {
        if ($user->doesntHavePermission(PrivilegeBanner::MENGHAPUS)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Banner');
        }

        return $this->allow();
    }
}
