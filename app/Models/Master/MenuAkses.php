<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAkses extends Model
{
    use HasStringPrimaryKey;

    protected $table = 'm_menu_akses';

    protected $primaryKey = 'uuid_menu_akses';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function getRoleMenu($query_return = true)
    {
        $relation = $this->belongsToMany(RoleMenu::class, 'm_role_menu_akses', 'uuid_menu_akses', 'uuid_menu_akses')
            ->withPivot(['akses']);

        return ($query_return ? $relation : $relation->get());
    }
}
