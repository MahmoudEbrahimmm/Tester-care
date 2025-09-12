<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'device',
        'description',
        'image',
        'cost',
        'paid',
    ];
}
