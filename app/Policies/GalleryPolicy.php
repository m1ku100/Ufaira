<?php

namespace App\Policies;

use App\Models\Master\Gallery;
use App\Models\Master\User;
use App\Support\Privilege\Profile\PrivilegeGallery;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        if ($user->doesntHavePermission(PrivilegeGallery::MENAMBAH)) {
            return $this->deny('Anda tidak memiliki hak akses menambah Gallery');
        }

        return $this->allow();
    }

    public function update(User $user,Gallery $Gallery = null)
    {
        if ($user->doesntHavePermission(PrivilegeGallery::MENGUBAH)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Gallery');
        }

        return $this->allow();
    }

    public function delete(User $user,Gallery $Gallery = null)
    {
        if ($user->doesntHavePermission(PrivilegeGallery::MENGHAPUS)) {
            return $this->deny('Anda tidak memiliki hak akses mengubah Gallery');
        }

        return $this->allow();
    }
}
