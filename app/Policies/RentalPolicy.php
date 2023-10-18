<?php

namespace App\Policies;

use App\Models\Master\Rental;
use App\Models\Master\Tour;
use App\Models\Master\User;
use App\Support\Privilege\Master\PrivilegeRental;
use Illuminate\Auth\Access\HandlesAuthorization;

class RentalPolicy
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
        if ($user->doesntHavePermission(PrivilegeRental::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Tour ');
        }

        return $this->allow();
    }

    public function update(User $user, Rental $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegeRental::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Tour ');
        }

        return $this->allow();
    }


    public function delete(User $user, Rental $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeRental::MENGHAPUS)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus Tour ');
        }

        return $this->allow();
    }

    public function restore(User $user, Rental $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeRental::MEMULIHKAN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk memulihkan Tour ');
        }

        return $this->allow();
    }

    public function forceDelete(User $user, Rental $Tour = null)
    {
        if ($user->doesntHavePermission(PrivilegeRental::MENGHAPUS_PERMANEN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus permanen Tour ');
        }

        return $this->allow();
    }
}
