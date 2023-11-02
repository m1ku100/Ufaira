<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    use HasStringPrimaryKey,HasHistoryActivities;

    protected $table = 'p_gallery';

    protected $primaryKey = 'uuid_gallery';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $literal_name = 'Gallery';

    protected $object_name_field = 'uuid_gallery';

    public function getDetailTour()
    {
        return $this->belongsTo(TourDetail::class,'uuid_tour_detail','uuid_tour_detail');
    }

    public function simpan($data)
    {
        DB::beginTransaction();

        try {
            $banner = Gallery::query()->create($data);

            $banner->writeCreateLog($banner->toArray());
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    /**
     * Menghapus banner
     *
     * @return boolean|string
     */
    public function hapus()
    {
        DB::beginTransaction();

        try {
            $data = $this->toArray();

            $this->delete();

            $this->writeDeleteLog($data);
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }
}
