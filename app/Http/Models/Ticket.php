<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Notifiable;
    //
    protected $table = 'tb_tickets';
    protected $fillable = [
        'ticket_crew', 'ticket_room', 'ticket_desc', 'ticket_type', 'ticket_status', 'ticket_priority', 'ticket_assign', 'ticket_due'
    ];
}
