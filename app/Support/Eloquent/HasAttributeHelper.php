<?php

namespace App\Support\Eloquent;

trait HasAttributeHelper
{
    /**
     * Mendapatkan perubahan atribute tertentu dari sebuah model
     *
     * @param string $attribute
     * @return object
     */
    public function getMutatedAttribute($attribute)
    {
        $original = isset($this->original[$attribute]) ? $this->original[$attribute] : null;

        $changes = isset($this->changes[$attribute]) ? $this->changes[$attribute] : null;

        $mutation = [
            'old'   => $original,
            'new'   => $changes
        ];

        return (object) $mutation;
    }

    /**
     * Mendapatkan daftar atribut yang berubah serta perubahannya
     *
     * @return array
     */
    public function getMutatedAttributes()
    {
        $changed_attributes = $this->changes;

        $mutations = [];

        foreach ($changed_attributes as $attribute => $new_value) {
            $mutations[$attribute] = $this->getMutatedAttribute($attribute);
        }

        return $mutations;
    }

    /**
     * Mengecek apakah atribut tertentu berubah dari $old menjadi $new
     *
     * @param string $attribute
     * @param mixed $old
     * @param mixed $new
     * @return boolean
     */
    public function isChanged($attribute, $old, $new)
    {
        $mutation = $this->getMutatedAttribute($attribute);

        return $mutation->old == $old && $mutation->new == $new;
    }

    public function isFilled($attribute)
    {
        $mutation = $this->getMutatedAttribute($attribute);

        return is_null($mutation->old) && ! is_null($mutation->new);
    }
}
