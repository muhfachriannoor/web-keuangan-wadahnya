<?php

namespace App\Helpers;

class FormatIDHelper {
    static function format_rupiah($value) {
        return "Rp " . number_format($value, 0, ',', '.');
    }
}