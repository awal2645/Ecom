<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontnendSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'tel',
        'address',
        'logo',
        'banner',
    ];
    
}
