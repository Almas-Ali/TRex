<?php
/*
* This is helper file for this project.
* Md. Almas Ali
* 
*/

// if (!function_exists("almas")) {
//     function almas($str) 
//     {
//         Str::limit(strip_tags($str), 50);
//     }
// }

use App\Models\settings;
use Carbon\Carbon;

if (!function_exists("website")) {
    function website() {
        $settings = Settings::orderBy('updated_at', 'desc')->first();
        return $settings;
    }
}


if (!function_exists("dateHuman")) {
    function dateHuman($date) {
        $carbonated_date = Carbon::parse($date);
        $diff_date = $carbonated_date->diffForHumans(Carbon::now());
        return $diff_date;
    }
}



// 'website_name' => env('WEBSITE_NAME', 'CNPI Blog'),
// 'website_author' => env('WEBSITE_AUTHOR', 'Md. Almas Ali'),