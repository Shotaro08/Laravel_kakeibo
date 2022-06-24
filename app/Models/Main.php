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
        'month',
        'date',
        'amount',
        'description',
        'users_id',
        'year',
        'primary_categories_id',
        'payment_methods_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_methods_id');
    }

    public function category()
    {
        return $this->belongsTo(PrimaryCategory::class, 'primary_categories_id');
    }

    public function amountPerMonth(){

    }
}
