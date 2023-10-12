<?php

namespace App\Support\Eloquent;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait HasKode
{
    /**
     * Mendapatkan kode terbaru dari sebuah model
     *
     * @param string $tanggal
     * @return string
     */
    public function generateKode($tanggal)
    {
        $carbon = Carbon::parse($tanggal);

        $prefix = $this->prefix_kode;

        $tanggal = $carbon->format('ymd');

        $kode = $prefix . $tanggal;

        // mencari kode dengan prefix yang sama
        $max_kode = self::where($this->field_kode, 'like', $kode . '%')
            ->max($this->field_kode);

        // echo "Max kode : " . $max_kode . PHP_EOL;

        if (!is_null($max_kode)) {
            $digit_terakhir = (int) Str::after($max_kode, $kode);

            $kode .= str_pad(++$digit_terakhir, 4, '0', STR_PAD_LEFT);
        } else {
            $kode .= '0001';
        }

        return $kode;
    }

    /**
     * Mengisi kolom kode_ pada tabel
     *
     * @param string|null $tanggal
     * @return string
     */
    public function simpanKode($tanggal = null)
    {
        $tanggal = $tanggal ?? ($this->{$this->getTanggal()} ?? Carbon::now());

        $kode = $this->generateKode($tanggal);

        while (static::where($this->field_kode, $kode)->count() > 0) {
            $kode = $this->generateKode($tanggal);
        }

        $this->update([
            $this->field_kode => $kode
        ]);

        return $kode;
    }

    /**
     * Mengisi atribut kode
     *
     * @param string $tanggal
     *
     * @return string
     */
    public function fillKode($tanggal = null)
    {
        if (! is_null($this->{$this->getFieldKode()})) {
            return $this->{$this->getFieldKode()};
        }

        $tanggal = $tanggal ?? ($this->{$this->getTanggal()} ?? Carbon::now());

        $kode = $this->generateKode($tanggal);

        while (static::where($this->field_kode, $kode)->count() > 0) {
            $kode = $this->generateKode($tanggal);
        }

        $this->{$this->getFieldKode()} = $kode;

        return $kode;
    }

    /**
     * Mendapatkan nama kolom untuk kode
     *
     * @return string|null
     */
    public function getFieldKode()
    {
        return $this->field_kode;
    }

    /**
     * Mendapatkan nama kolom untuk tanggal
     *
     * @return string
     */
    public function getFieldTanggal()
    {
        return $this->field_tanggal ?? 'created_at';
    }

    /**
     * Mendapatkan tanggal untuk generate kode
     *
     * @return string|null
     */
    public function getTanggal()
    {
        return $this->created_at;
    }
}
