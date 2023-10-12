<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasStringPrimaryKey,
        HasHistoryActivities;

    protected $table = 'm_menu';

    protected $primaryKey = 'uuid_menu';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function getMenuAkses($query_return = true)
    {
        $relation = $this->hasMany(MenuAkses::class, 'uuid_menu', 'uuid_menu');

        return ($query_return ? $relation : $relation->get());
    }

    public static function search($nama_menu)
    {
        return static::where('nama_menu', $nama_menu)->first();
    }
}
