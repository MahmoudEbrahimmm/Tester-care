<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cart extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'cookie_id','user_id','product_id','quantity','image','options',
    ];

    protected static function booted(){

        static::observe(CartObserver::class);
    }
    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name'=>"زائر"
        ]);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    

}
