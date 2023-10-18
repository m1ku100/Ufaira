<?php

namespace App\Models\Master;

use App\Models\Profile\Blog;
use App\Models\Profile\BlogKategori;
use App\Support\Eloquent\HasStringPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tour extends Model
{
    use HasFactory,HasStringPrimaryKey;

    protected $table = 'm_tour';

    protected $primaryKey = 'uuid_tour';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function simpan($tour, $data)
    {
        DB::beginTransaction();

        try {
            if (is_null($tour)) {
                $tour = self::query()
                    ->create($data);
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
