<?php

namespace App\Policies;

use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Support\Privilege\Master\PrivilegeTour;
use Illuminate\Auth\Access\HandlesAuthorization;

class TourPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\Master\Tour $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Tour ');
        }

        return $this->allow();
    }

    public function update(User $user, Tour $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Tour ');
        }

        return $this->allow();
    }


    public function delete(User $user, Tour $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENGHAPUS)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus Tour ');
        }

        return $this->allow();
    }

    public function restore(User $user, Tour $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MEMULIHKAN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk memulihkan Tour ');
        }

        return $this->allow();
    }

    public function forceDelete(User $user, Tour $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeTour::MENGHAPUS_PERMANEN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus permanen Tour ');
        }

        return $this->allow();
    }
}
