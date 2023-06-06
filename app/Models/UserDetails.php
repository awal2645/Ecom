<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'user_id',
        'address',
        'postcode',
        'state',
        'country',
        'image',


        
    ];
    public function users(){
        
        return $this->belongsTo(User::class);
    }
}
