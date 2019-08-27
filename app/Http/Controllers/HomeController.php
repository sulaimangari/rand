<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Ticket;
use App\Http\Models\Borrow;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $username = Auth::user()->id;
        $countTicket = Ticket::count();
        $countDevice = Borrow::count();
        $tickets = Ticket::get();

        return view('home', compact('countTicket', 'countDevice', 'tickets'));
        // return view('home');
    }

    public function user()
    {
        return view('homeUser');
    }
}
