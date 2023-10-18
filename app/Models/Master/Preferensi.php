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

    /**
     * Mendapatkan mutator berdasarkan tipe data dari preferensi
     *
     * @param string $tipe_data
     * @return string
     */
    public static function mutator($tipe_data)
    {
        $mutator = [
            static::INT         => 'convertToInteger',
            static::ARRAY       => 'convertToArray',
            static::RELATION    => 'convertToModel'
        ];

        if (! isset($mutator[$tipe_data])) {
            return null;
        }

        return $mutator[$tipe_data];
    }

    /**
     * Mendapatkan turunan preferensi
     *
     * @param boolean $query_return
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Illuminate\Support\Collection
     */
    public function getChildren($query_return = true)
    {
        $relation = $this->hasMany(Preferensi::class, 'uuid_induk', 'uuid_preferensi');

        return ($query_return ? $relation : $relation->get());
    }

    /**
     * Mendapatkan daftar preferensi
     *
     * @param string|null $induk
     * @return \Illuminate\Support\Collection
     */
    public function getDaftarPreferensi($induk = null)
    {
        $builder = Preferensi::query()
            ->when(is_null($induk), function ($query) {
                $query->whereNull('uuid_induk');
            })
            ->when(is_not_null($induk), function ($query) use ($induk) {
                $query->where('uuid_induk', $induk);
            });

        $daftar_preferensi = $builder->get();

        return $daftar_preferensi;
    }


    /**
     * Mengecek apakah preferensi memiliki turunan
     *
     * @return boolean
     */
    public function hasChildren()
    {
        return $this->getChildren()->count() > 0;
    }

    /**
     * Mendapatkan prferensi berdasarkan key
     *
     * @param string $key
     * @return \App\Models\Utilities\Preferensi|null
     */
    public static function search($key)
    {
        $preferensi = static::where('key_preferensi', $key)->first();

        if (is_not_null(static::mutator($preferensi->jenis_data))) {
            $preferensi->nilai = $preferensi->{static::mutator($preferensi->jenis_data)}($preferensi->nilai);
        }

        return $preferensi;
    }

    /**
     * Casting value preferensi ke integer
     *
     * @param mixed $value
     * @return int
     */
    public function convertToInteger($value)
    {
        return (int) $value;
    }

    /**
     * Casting value preferensi ke array
     *
     * @param mixed $value
     * @return array
     */
    public function convertToArray($value)
    {
        return json_decode($value, true);
    }

    /**
     * Casting value preferensi ke model tertentu
     *
     * @param mixed $value
     * @return object
     */
    public function convertToModel($value)
    {
        $class_name = $this->related_class;

        $model = app($class_name);

        $related = $model->where($this->related_column, $value)
            ->first();

        return $related;
    }
}
