<?php

namespace App\Models\Master;

use App\Models\Profile\Blog;
use App\Models\Profile\BlogKategori;
use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory, HasStringPrimaryKey, CustomSoftDelete, HasHistoryActivities;

    protected $table = 'm_tour';

    protected $primaryKey = 'uuid_tour';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $prefix_kode = 'TOUR';

    protected $field_kode = '';

    protected $object_name_field = 'nama_tour';

    protected $status_field = 'status_tour';

    protected $literal_name = 'Tour';

    public const DIHAPUS = 'D';

    public const AKTIF = 'I';


    public function getDetail()
    {
        return $this->hasOne(TourDetail::class,'uuid_tour','uuid_tour');
    }

    public function simpan($tour, $data)
    {
        DB::beginTransaction();

        try {
            if (is_null($tour)) {
                $tour = self::query()
                    ->create($data);

                TourDetail::query()->create([
                    'uuid_tour_detail' => new_uuid(),
                    'uuid_tour' => $tour->uuid_tour
                ]);
            } else {
                $tour->update($data);
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
        $builder = DB::table('m_tour as mpg')
            ->selectRaw("*");

        $builder->when(!empty($request->input('search.value')), function ($query) use ($request) {
            $query->where('mpg.nama_tour', 'like', '%' . $request->input('search.value') . '%');
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
