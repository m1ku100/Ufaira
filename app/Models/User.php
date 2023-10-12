<?php

namespace App\Models;

use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasStringPrimaryKey, CustomSoftDelete;

    protected $table = 'm_pengguna';

    protected $primaryKey = 'uuid_pengguna';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $prefix_kode = 'PGN';

    protected $field_kode = 'kode_pengguna';

    protected $object_name_field = 'nama_pengguna';

    protected $status_field = 'status_pengguna';

    protected $literal_name = 'Pengguna';

    public const DIHAPUS = 'D';

    public const AKTIF = 'I';
}
