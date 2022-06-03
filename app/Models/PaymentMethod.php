<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Main;

class PaymentMethod extends Model
{
    use HasFactory;

    public function main()
    {
        return $this->hasMany(Main::class);
    }
}
