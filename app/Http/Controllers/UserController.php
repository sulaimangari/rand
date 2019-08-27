<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Ticket;
use App\Http\Models\Borrow;
use App\Http\Models\User;
use Auth;

use Illuminate\Contracts\Auth\CanResetPassword;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeUser()
    {
        $username = Auth::user()->name;
        $countTicket = Ticket::where('ticket_crew', $username)->count();
        $countDevice = Borrow::where('crew_name', $username)->count();

        return view('user.dashboard', compact('countTicket', 'countDevice'))->with('user', auth()->user());
    }

    public function ticketUser()
    {
        $username = Auth::user()->name;
        $tickets = Ticket::where('ticket_crew', $username)->get();

        return view('user.ticket', compact('tickets'))->with('user', auth()->user());
    }

    public function deviceUser()
    {
        $username = Auth::user()->name;
        $device = Borrow::where('crew_name', $username)->get();

        return view('user.device', compact('device'))->with('user', auth()->user());
    }
}
