<?php

namespace App\Policies;

use App\Models\Master\User;
use App\Support\Privilege\Master\PrivilegePengguna;
use App\Support\Privilege\Master\PrivilegeTour;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\Master\Pengguna $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Pengguna ');
        }

        return $this->allow();
    }

    public function update(User $user, User $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Pengguna ');
        }

        return $this->allow();
    }
}
