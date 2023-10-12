<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
//    use HasStringPrimaryKey;

    protected $table = 'u_preferensi';

    protected $primaryKey = 'uuid_preferensi';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public const STRING = 'STRING';

    public const INT = 'INT';

    public const ARRAY = 'ARRAY';

    public const RELATION = 'RELATION';

    public const TEXT = 'TEXT';

    public const NUMBER = 'NUMBER';

    public const TEXTAREA = 'TEXTAREA';

    public const RICHTEXT = 'RICHTEXT';

    public const IMAGE = 'IMAGE';
}
