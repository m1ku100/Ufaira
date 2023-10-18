<?php

namespace App\Models\Master;

use App\Support\Eloquent\CustomSoftDelete;
use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDetail extends Model
{
    use HasStringPrimaryKey, HasHistoryActivities;

    protected $table = 'm_tour_detail';

    protected $primaryKey = 'uuid_tour_detail';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $literal_name = 'Tour Detail';


}
