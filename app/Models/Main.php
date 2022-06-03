<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PaymentMethod;
use App\Models\User;

class Main extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
