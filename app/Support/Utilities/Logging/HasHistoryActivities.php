<?php

namespace App\Support\Utilities\Logging;

use App\Models\Utilities\RiwayatAktivitas;
use Illuminate\Support\Facades\DB;

trait HasHistoryActivities
{
    /**
     * Mencatat riwayat aktivitas untuk penambahan data
     *
     * @param array $properties
     * @param string|null $activity
     * @return bool
     */
    public function writeCreateLog($properties = [], $activity = null)
    {
        if (is_null($activity)) {
            $activity = 'Menambah ' . $this->literal_name;
        }

        return $this->writeQuickLog($properties, 'create', $activity);
    }

    /**
     * Mencatat riwayat aktivitas untuk pengubahan data
     *
     * @param array $properties
     * @param string|null $activity
     * @return bool
     */
    public function writeUpdateLog($properties = [], $activity = null)
    {
        if (is_null($activity)) {
            $activity = 'Mengubah ' . $this->literal_name;
        }

        return $this->writeQuickLog($properties, 'update', $activity);
    }

    /**
     * Mencatat riwayat aktivitas untuk menghapus data
     *
     * @param array $properties
     * @param string|null $activity
     * @return bool
     */
    public function writeDeleteLog($properties = [], $activity = null)
    {
        if (is_null($activity)) {
            $activity = 'Menghapus ' . $this->literal_name;
        }

        return $this->writeQuickLog($properties, 'delete', $activity);
    }

    /**
     * Mencatat riwayat aktivitas untuk pemulihan data
     *
     * @param array $properties
     * @param string|null $activity
     * @return bool
     */
    public function writeRestoreLog($properties = [], $activity = null)
    {
        if (is_null($activity)) {
            $activity = 'Memulihkan ' . $this->literal_name;
        }

        return $this->writeQuickLog($properties, 'restore', $activity);
    }

    /**
     * Mencatat riwayat aktivitas untuk penghapusan data secara permanen
     *
     * @param array $properties
     * @param string|null $activity
     * @return bool
     */
    public function writeForceDeleteLog($properties = [], $activity = null)
    {
        if (is_null($activity)) {
            $activity = 'Menghapus Permanen ' . $this->literal_name;
        }

        return $this->writeQuickLog($properties, 'force delete', $activity);
    }

    /**
     * Mencatat riwayat aktivitas dengan parameter
     * lebih sedikit
     *
     * @param array $properties
     * @param string|null $event
     * @param string|null $activity
     * @return bool|string
     */
    public function writeQuickLog($properties = [], $event = null, $activity = null)
    {
        return $this->writeLog($this, auth()->user(), $properties, $event, $activity);
    }

    /**
     * Mencatat riwayat aktivitas
     *
     * @return boolean
     */
    public function writeLog($object, $subject, $properties = [], $event = null, $activity = null)
    {
        if (defined('SEEDER')) {
            return false;
        }

        $subject_id = is_not_null($subject) ? $subject->{$subject->getKeyName()} : null;
        $subject_class = is_not_null($subject) ? get_class($subject) : null;

        $data = [
            'uuid_aktivitas'    => new_uuid(),
            'object'            => $object->{$object->getKeyName()} ?? $object->getPrimaryKey(),
            'object_class'      => get_class($object),
            'subject'           => $subject_id,
            'subject_class'     => $subject_class,
            'properties'        => json_encode($properties),
            'activity'          => $activity,
            'event'             => $event
        ];

        $riwayat = new RiwayatAktivitas($data);

        $riwayat->save();

        DB::beginTransaction();

        try {
            $riwayat->save();
        } catch (Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        DB::commit();

        return true;
    }

    /**
     * Mendapatkan nama object/model yang bersangkutan
     *
     * @return string|null
     */
    public function getObjectName()
    {
        if (property_exists($this, 'object_name_field')) {
            return $this->{$this->object_name_field};
        }

        if (property_exists($this, 'field_kode')) {
            return $this->{$this->field_kode};
        }

        return $this->{$this->primaryKey};
    }
}
