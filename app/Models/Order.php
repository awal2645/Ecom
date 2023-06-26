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
    public function userdetail()
    {
        return $this->belongsTo(Shiping::class, "user_id");
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_name', "name");
    }
}
