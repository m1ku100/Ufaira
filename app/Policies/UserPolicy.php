<?php

namespace App\Policies;

use App\Models\Master\User;
use App\Support\Privilege\Master\PrivilegePengguna;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
        if ($user->doesntHavePermission(PrivilegePengguna::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Pengguna ');
        }

        return $this->allow();
    }

    public function update(User $user, User $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegePengguna::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Pengguna ');
        }

        return $this->allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Master\Pengguna $user
     * @param \App\Models\Profile\Pengguna $Pengguna
     * @return mixed
     */
    public function delete(User $user, User $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegePengguna::MENGHAPUS)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus Pengguna ');
        }

        return $this->allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Master\Pengguna $user
     * @param \App\Models\Profile\Pengguna $Pengguna
     * @return mixed
     */
    public function restore(User $user, User $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegePengguna::MEMULIHKAN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk memulihkan Pengguna ');
        }

        return $this->allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Master\Pengguna $user
     * @param \App\Models\Profile\Pengguna $Pengguna
     * @return mixed
     */
    public function forceDelete(User $user, User $Pengguna = null)
    {
        if ($user->doesntHavePermission(PrivilegePengguna::MENGHAPUS_PERMANEN)) {
            return $this->deny('Anda tidak memiliki hak akses untuk menghapus permanen Pengguna ');
        }

        return $this->allow();
    }
}
