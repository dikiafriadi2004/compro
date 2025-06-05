<?php

namespace App\Helpers;

class PhoneHelper
{
    public static function formatNomorHp(string $nomor): string
    {
        // Jika diawali dengan "62", ubah ke "0"
        if (str_starts_with($nomor, '62')) {
            $nomor = '0' . substr($nomor, 2);
        }

        // Format jadi 0858-5664-5555
        return substr($nomor, 0, 4) . '-' . substr($nomor, 4, 4) . '-' . substr($nomor, 8);
    }
}
