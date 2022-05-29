<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $table = "main";

    protected $fillable = [
        'user_id',
        'year',
        'month',
        'date',
        'category1_id',
        'category2_id',
        'amount',
        'description',
        'payment_method_id',
    ];
}
