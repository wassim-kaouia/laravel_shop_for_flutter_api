<?php

namespace App;

use App\User;
use App\TicketType;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'ticket_type_id',
        'title',
        'message',
        'status',
    ];

    public function tickettype(){
        return $this->belongsTo(TicketType::class);
    }

    public function customer(){
        return $this->belongsTo(User::class);
    }
}
