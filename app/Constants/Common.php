<?php

namespace App\Constants;

use Carbon\Carbon;

class Common
{
    const CATEGORY = 'カテゴリー';

    public function year(){
        $date = new Carbon;
        $year = $date->year;
        return $year;
    }
}
