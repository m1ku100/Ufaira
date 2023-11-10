<?php

namespace App\Models\Master;

use App\Support\Eloquent\HasStringPrimaryKey;
use App\Support\Utilities\Logging\HasHistoryActivities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasStringPrimaryKey,
        HasHistoryActivities;

    protected $table = 'p_banner';

    protected $primaryKey = 'uuid_banner';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $literal_name = 'Banner';

    protected $object_name_field = 'uuid_banner';

    /**
     * Menyimpan data banner
     *
     * @param array $data
     * @return \App\Models\Profile\Banner|string
     */
    public function simpan($data)
    {
        DB::beginTransaction();

        try {
            $banner = Banner::query()->create($data);

            $banner->writeCreateLog($banner->toArray());
        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        DB::commit();

        return true;
    }

    public function edit($banner, $data)
    {
        DB::beginTransaction();

        try {
            $banner->update($data);

        } catch (Exception $exception) {
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
