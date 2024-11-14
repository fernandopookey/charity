<?php

function rupiahFormat($nominal, $prefix = null)
{
    $prefix = $prefix ? $prefix : 'Rp. ';
    return $prefix . number_format($nominal, 0, ',', '.');
}

function rupiahFormatFloat($nominal, $prefix = null)
{
    // Jika nominal bukan angka, coba konversi menjadi angka
    if (!is_numeric($nominal)) {
        throw new InvalidArgumentException("Nominal harus berupa angka.");
    }

    // Konversi ke float
    $nominal = (float) $nominal; // Ubah tipe menjadi float

    // Atur prefix jika tidak disediakan
    $prefix = $prefix ? $prefix : 'Rp. ';

    // Format angka menjadi format rupiah
    return $prefix . number_format($nominal, 0, ',', '.');
}

function dateFormat($date, $format = 'Y-MM-DD')
{
    return \Carbon\Carbon::parse($date)->isoFormat($format);
}

function NowDate($format = 'Y-MM-DD')
{
    return  $nowDate = \Carbon\Carbon::now()->tz('Asia/Jakarta')->isoFormat($format);
}
