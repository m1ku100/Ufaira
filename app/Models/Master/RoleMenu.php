<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    use HasStringPrimaryKey;

    protected $table = 'm_role_menu';

    protected $primaryKey = 'uuid_role_menu';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function getMenuAkses($query_return = true)
    {
        $relation = $this->belongsToMany(MenuAkses::class, 'm_role_menu_akses', 'uuid_role_menu', 'uuid_menu_akses', 'uuid_role_menu', 'uuid_menu_akses');

        return ($query_return ? $relation : $relation->get());
    }

    public function getMenu($query_return = true)
    {
        $relation = $this->belongsTo(Menu::class, 'uuid_menu', 'uuid_menu');

        return ($query_return ? $relation : $relation->first());
    }
}
