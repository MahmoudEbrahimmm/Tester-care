<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'stock',
        'description',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function carts(){
        return $this->hasMany(Cart::class,'product_id','id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id','id');
    }
    public function scopeLatestProduct($query, $limit = null){
        $query->latest();
        if($limit){
            $query->limit($limit);
        }
        return $query;
    }
}
