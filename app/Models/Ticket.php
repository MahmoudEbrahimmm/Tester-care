<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tracking_code',
        'name',
        'email',
        'phone',
        'description',
        'device_model',
        'status',
        'price',
        'paid_amount',
    ];
    
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function ticketStatusLog(){
        return $this->hasMany(Ticket_Status_Log::class,'ticket_id','id');
    }
}
