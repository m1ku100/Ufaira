<?php

namespace App\Support\Eloquent;

use App\Models\Master\Produk;
use App\Models\Views\Master\ViewProduk;

trait HasProduk
{
    /**
     * Mendapatkan daftar produk
     *
     * @param bool $queryReturn
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|object|static
     */
    public function getProduk($query_return = true)
    {
        $relation = $this->belongsTo(Produk::class, $this->produkKey, 'uuid_produk');

        return ($query_return ? $relation : $relation->first());
    }

    /**
     * Mendapatkan daftar produk dari view
     *
     * @param bool $query_return
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|object|static
     */
    public function getViewProduk($query_return = true)
    {
        $relation = $this->belongsTo(Produk::class, $this->produkKey, 'uuid_produk');
//
        return ($query_return ? $relation : $relation->first());
    }
}
