<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Status_Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'changed_by_user_id',
        'old_status',
        'new_status',
        'note',
    ];
    public function Tickets(){
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }
}
