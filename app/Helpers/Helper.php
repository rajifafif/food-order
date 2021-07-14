<?php

namespace App\Helpers;

class Helper
{
    public static function deSlug($slug) {
        return ucwords(str_replace('-', ' ', $slug));
    }
}
