<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = 'tb_tickets';
    protected $fillable = [
        'ticket_crew', 'ticket_room', 'ticket_desc', 'ticket_type', 'ticket_status', 'ticket_priority', 'ticket_assign', 'ticket_due'
    ];
}
