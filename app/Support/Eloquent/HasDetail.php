<?php

namespace App\Support\Eloquent;

trait HasDetail
{
    public function getDetail($query_return = true)
    {
        $relation = $this->hasMany(
            $this->detailClass, $this->detailTableForeignKey, $this->detailTableLocalKey
        );

        return ($query_return ? $relation : $relation->get());
    }
}
