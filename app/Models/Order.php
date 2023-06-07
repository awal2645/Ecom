<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_name",
        "payment_status",
        "product_img",
        "price",
        "qty",
    ];
    public function shiping()
    {
        return $this->belongsTo(Shiping::class, "order_id");
    }
}
