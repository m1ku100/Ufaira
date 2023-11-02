<?php

namespace App\Models\Master;

use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class TourDetail extends Model
{
    use HasStringPrimaryKey, HasHistoryActivities;

    protected $table = 'm_tour_detail';

    protected $primaryKey = 'uuid_tour_detail';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $literal_name = 'Tour Detail';

    public function getTour()
    {
        return $this->belongsTo(Tour::class, 'uuid_tour', 'uuid_tour');
    }

    public function getGallery()
    {
        return $this->hasMany(Gallery::class, 'uuid_tour_detail', 'uuid_tour_detail');
    }

    public function simpan($tour, $data, $gambar)
    {
        DB::beginTransaction();

        try {
            $tour->update($data);

            $tour->getGallery()->delete();

            $tour->getGallery()->createMany($gambar);

            $tour->writeUpdateLog($tour);

        } catch (ModelNotFoundException $exception) {
            DB::rollBack();

            return $exception->getMessage();
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }
}
