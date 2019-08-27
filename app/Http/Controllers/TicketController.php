<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Ticket;
use Auth;
use function GuzzleHttp\Promise\all;

class TicketController extends Controller
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


    //
    public function createTicket()
    {
        return view('ticket.create');
    }

    public function listTicket()
    {
        $tickets = Ticket::get();

        return view('ticket.list', compact('tickets'));
    }

    public function storeTicket(Request $request)
    {
        $request->validate([
            // 'ticket_crew' => 'required',
            'ticket_room' => 'required',
            'ticket_desc' => 'required',
            'ticket_type' => 'required',
            'ticket_status' => 'nullable',
            'ticket_priority' => 'nullable',
            'ticket_assign' => 'nullable'
        ]);

        $ticket = new Ticket([
            'ticket_crew' => Auth::user()->name,
            'ticket_room' => $request->get('ticket_room'),
            'ticket_desc' => $request->get('ticket_desc'),
            'ticket_due' => $request->get('ticket_due'),
            'ticket_type' => $request->get('ticket_type'),
            'ticket_status' => $request->get('ticket_status'),
            'ticket_priority' => $request->get('ticket_priority'),
            'ticket_assign' =>  $request->get('ticket_assign')
        ]);

        $ticket->save();

        $request->session()->flash('message', 'Ticket has been issued!');

        if (Auth::user()->role === 'admin') {
            return redirect()->route('listTicket');
        } else {
            return redirect()->route('ticketUser');
        }

        // return redirect()->route('createTicket')->with('message', 'Ticket has been issued!');
    }

    public function editTicket(Request $request, $id)
    {
        Auth::user()->authorizeRoles(['admin',]);
        $ticket = Ticket::findOrFail($id);

        return view('ticket.edit', compact('ticket'));
    }

    public function updateTicket(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);
        $request->validate([
            'ticket_crew' => 'required',
            'ticket_room' => 'required',
            'ticket_desc' => 'required',
            'ticket_type' => 'required',
            'ticket_status' => 'required',
            'ticket_priority' => 'required',

        ]);

        Ticket::where('id', $request->get('id'))->update(array(
            'ticket_crew' => $request->get('ticket_crew'),
            'ticket_room' => $request->get('ticket_room'),
            'ticket_desc' => $request->get('ticket_desc'),
            'ticket_type' => $request->get('ticket_type'),
            'ticket_status' => $request->get('ticket_status'),
            'ticket_priority' => $request->get('ticket_priority'),
            'ticket_assign' => Auth::user()->name,
        ));

        return redirect()->route('listTicket')->with('message', 'Ticket Successfully Updated');
    }

    public function destroyTicket(Request $request)
    {
        Auth::user()->authorizeRoles(['admin',]);
        $id = $request->input('id');
        $ticket = Ticket::find($id);

        $ticket->delete();

        return redirect()->route('listTicket')->with('message', 'Ticket has been deleted!');
    }
}
