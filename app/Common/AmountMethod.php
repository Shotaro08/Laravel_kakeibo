<?php

namespace App\Common;

use App\Models\Main;
use Illuminate\Support\Facades\Auth;
use App\Common\CommonMethod;


class AmountMethod
{
    public static function thisMonth()
    {
        $user_id = Auth::id();
        $thisMonth = CommonMethod::thisMonth();

        $d_thisMonth = Main::where('user_id', $user_id)->where('month', $thisMonth);

        return $d_thisMonth;
    }

    public static function amountThisMonthCategory1()
    {
        $d_thisMonth = self::thisMonth();
        $amountCategory1 = $d_thisMonth->where('primary_categories_id', 1)->sum('amount');

        return $amountCategory1;
    }
    public static function amountThisMonthCategory2()
    {
        $d_thisMonth = self::thisMonth();
        $amountCategory2 = $d_thisMonth->where('primary_categories_id', 2)->sum('amount');

        return $amountCategory2;

    }
    public static function amountThisMonthCategory3()
    {
        $d_thisMonth = self::thisMonth();
        $amountCategory3 = $d_thisMonth->where('primary_categories_id', 3)->sum('amount');

        return $amountCategory3;
    }
    public static function amountThisMonthCategory4()
    {
        $d_thisMonth = self::thisMonth();
        $amountCategory4 = $d_thisMonth->where('primary_categories_id', 4)->sum('amount');

        return $amountCategory4;
    }
}
