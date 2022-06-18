<?php

namespace App\Common;

use Carbon\Carbon;

class CommonMethod
{
    public static function thisMonth(){
        $date = new Carbon;
        $thisMonth = $date->month;

        return $thisMonth;
    }

    public static function lastMonth(){
        $date = new Carbon;
        $lastMonth = $date->subMonth()->month;

        return $lastMonth;
    }

    public static function nextMonth(){
        $date = new Carbon;
        $nextMonth = $date->addMonth()->month;

        return $nextMonth;
    }

    public static function thisYear(){
        $date = new Carbon;
        $thisYear = $date->year;

        return $thisYear;
    }
}
