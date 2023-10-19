<?php

namespace App\Models\Master;

use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Rental extends Model
{
    use HasFactory, HasStringPrimaryKey, CustomSoftDelete, HasHistoryActivities;

    protected $table = 'm_tour_detail';

    protected $primaryKey = 'uuid_tour_detail';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $prefix_kode = 'TOUR';

    protected $field_kode = '';

    protected $object_name_field = 'nama_rental';

    protected $status_field = 'status_rental';

    protected $literal_name = 'Tour';

    public const DIHAPUS = 'D';

    public const AKTIF = 'I';


    public function simpan($blog, $data, $daftar_kategori)
    {
        DB::beginTransaction();

        try {
            if (is_null($blog)) {
                 self::query()
                    ->create($data);
            } else {
                $blog->update($data);
            }

        } catch (Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    public function tableData(Request $request)
    {
        $builder = DB::table('m_rental as mpg')
            ->selectRaw("*");

        $builder->when(!empty($request->input('search.value')), function ($query) use ($request) {
            $query->where('mpg.nama_kendaraan', 'like', '%' . $request->input('search.value') . '%');
        });

        $total_data = $builder->count();

        $builder->take($request->length)
            ->offset($request->start);

        return [
            'draw'              => $request->draw,
            'recordsTotal'      => $total_data,
            'recordsFiltered'   => $total_data,
            'data'              => $builder->get()
        ];
    }
}
