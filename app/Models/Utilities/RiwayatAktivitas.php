<?php

namespace App\Models\Utilities;

use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\BuilderHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatAktivitas extends Model
{
    use HasStringPrimaryKey;

    protected $table = 'u_riwayat_aktivitas';

    protected $primaryKey = 'uuid_aktivitas';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    public function tableData(Request $request)
    {
        $builder = DB::table('u_riwayat_aktivitas')
            ->orderByDesc('created_at');

        $total_data = BuilderHelper::countResult($builder);

        $builder->take($request->length)
            ->offset($request->start);

        $data = $builder->get();

        $data->each(function ($item) {
            $object = app($item->object_class)->find($item->object);

            if (is_not_null($object)) {
                $item->object = $object->getObjectName();
            }

            if (is_not_null($item->subject)) {
                $subject = app($item->subject_class)->find($item->subject);

                if (is_not_null($subject)) {
                    $item->subject = $subject->getObjectName();
                }
            }
        });

        return [
            'draw'              => $request->draw,
            'recordsTotal'      => $total_data,
            'recordsFiltered'   => $total_data,
            'data'              => $data
        ];
    }
}
