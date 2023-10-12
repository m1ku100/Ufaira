<?php

namespace App\Support\Eloquent;

trait HasStringPrimaryKey
{
    /**
     * Mengisi primary key dengan uuid
     *
     * @return void
     */
    public function fillPrimaryKey()
    {
        if (! isset($this->{$this->primaryKey})) {
            $this->{$this->primaryKey} = new_uuid();
        }
    }

    /**
     * Mendapatkan value/isi dari primary key
     *
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->{$this->primaryKey};
    }
}
