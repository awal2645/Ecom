<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiping extends Model
{
    use HasFactory;
    protected $fillable = [

        "user_id",
        "order_id",
        "pay_ammount",
        "name",
        "phone",
        "email",
        "country",
        "postcode",
        "address",
    ];
}
