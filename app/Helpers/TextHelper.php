<?php

if (!function_exists('excerpt')) {
    /**
     * Potong teks berdasarkan karakter atau jumlah kata.
     *
     * @param string $text
     * @param int $limit
     * @param bool $byWords
     * @param string $end
     * @return string
     */
    function excerpt($text, $limit = 145, $byWords = false, $end = '...')
    {
        $text = strip_tags($text);

        if ($byWords) {
            $words = explode(' ', $text);
            if (count($words) <= $limit) return $text;
            return implode(' ', array_slice($words, 0, $limit)) . $end;
        }

        return \Illuminate\Support\Str::limit($text, $limit, $end);
    }
}
