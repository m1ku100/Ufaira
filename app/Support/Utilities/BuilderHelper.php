<?php

namespace App\Support\Utilities;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuilderHelper
{
    /**
     * Menghitung jumlah record yang diterima pada suatu query. Method ini
     * digunakan karena dalm kondisi tertentu, method count() pada Builder
     * emberikan hasil yang berbeda
     *
     * @param \Illuminate\Database\Query\Builder $builder
     *
     * @return int
     */
    public static function countResult(Builder $builder)
    {
        $new_builder = clone $builder;

        $table_builder = DB::table(DB::raw("({$new_builder->toSql()}) as raw"))
            ->mergeBindings($new_builder);

        $count = $table_builder->count();

        return $count;
    }

    /**
     * Mendapatkan sql dari builder tertentu beserta parameter sql-nya
     *
     * @param \Illuminate\Database\Query\Builder $builder
     *
     * @return string
     */
    public static function toSql(Builder $builder)
    {
        return Str::replaceArray('?', $builder->getBindings(), $builder->toSql());
    }
}
