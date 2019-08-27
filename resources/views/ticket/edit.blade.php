@extends('layout.master')

@section('style')

@endsection

@section('content')
<section class="content-header">
    <h1>
        Edit a ticket
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Support Ticket </li>
        <li class="active">Edit a ticket</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="callout callout-danger">
                @foreach ($errors->all() as $error)
                <p> <i class="fa fa-times"></i> {{ $error }}</p>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <form method="post" action="{{route('updateTicket')}}">
                @csrf
                {!! Form::hidden('id', $ticket->id ) !!}
                <div class="form-group">
                    <label>Crew</label>
                    <input type="text" class="form-control" placeholder="Crew full name" name="ticket_crew"
                        value="{{$ticket->ticket_crew}}">
                </div>

                <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" placeholder="ex: DevRoom 1" name="ticket_room"
                        value="{{$ticket->ticket_room}}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Issue Details"
                        name="ticket_desc">{{ ucfirst($ticket->ticket_desc) }}</textarea>
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="ticket_type" value="{{$ticket->ticket_type}}">
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Priority</label>
                    <select class="form-control" name="ticket_priority" value="{{$ticket->ticket_priority}}">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">Critical</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="ticket_status" value="{{$ticket->ticket_status}}">
                        <option value="1">Open</option>
                        <option value="2">Ongoing</option>
                        <option value="3">Finished</option>
                        <option value="4">Closed</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Ticket</button>
            </form>
        </div>
    </div>
</section>
@endsection
