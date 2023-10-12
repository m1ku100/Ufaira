<?php

namespace App\Support\Privilege;
use ReflectionClass;

class BasePrivilege
{
    /**
     * Mendapat konstanta dari class terkait sebagai daftar hak akses
     *
     * @param boolean $only_values
     * @return array
     */
    public static function getSemuaAkses($only_values = true)
    {
        $reflection = new ReflectionClass(static::class);

        $constants = $reflection->getConstants();

        if ($only_values) {
            return array_values($constants);
        }

        return $constants;
    }
}
