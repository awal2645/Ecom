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
        "shiping_status",
        "discount_amount",
        "name",
        "phone",
        "email",
        "country",
        "postcode",
        "address",
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
