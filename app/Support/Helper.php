<?php

use Illuminate\Support\Facades\DB;

/**
 * Mendapatkan seluruh direktori pada sebuah direktori
 *
 * @param string $path
 * @return \Illuminate\Support\Collection
 */
function scan_whole_dir($path)
{
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
    $iterator = iterator_to_array($iterator);
    $dirs = array_keys($iterator);

    return collect($dirs);
}

function format_harga($harga)
{
    return number_format($harga, 0, '', '.');
}

function new_uuid()
{
    return Str::orderedUuid()->toString();
}

function is_not_null($var)
{
    return !is_null($var);
}

function is_boolean($var)
{
    if (is_string($var)) {
        return strtolower($var) == 'true' || (int)$var > 0;
    }

    return $var;
}

function pelanggan()
{
    return auth()->user();
}

function get_blog_terbaru($jumlah)
{
//    $data = DB::table(DB::raw("(" . ViewBlog::getRawSql() . ") as vb"))
//        ->where('vb.status_blog', Blog::AKTIF)
//        ->orderByDesc('created_at')
//        ->take($jumlah)
//        ->get();

//    return $data;
}

function is_multidimensional($array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            return true;
        }
    }

    return false;
}

function remove_public_dirname($path)
{
    if (strpos($path, 'public/') == 0) {
        return \Illuminate\Support\Str::substr($path, 7);
    }

    return $path;
}

function pref($key)
{
    $preferensi = \App\Models\Profile\Preferensi::search($key);

    if (is_null($preferensi)) {
        return null;
    }

    return $preferensi->nilai;
}

/**
 * @param int $number
 * @return string
 */
function numberToRoman($number)
{
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if ($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
