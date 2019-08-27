@extends( Auth::user()->hasRole('admin') ? 'layout.master' : 'user.layout' )

@section('style')

@endsection

@section('content')
<section class="content-header">
    <h1>
        Issue a ticket
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Support Ticket </li>
        <li class="active">Issue a ticket</li>
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
            @elseif (session()->get('message'))
            <div class="callout callout-success">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <form method="post" action="{{route('storeTicket')}}">
                @csrf

                <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" placeholder="ex: DevRoom 1" name="ticket_room">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Issue Details" name="ticket_desc"></textarea>
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="ticket_type">
                        <option>Hardware</option>
                        <option>Software</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('ticket_due', 'Due date :') !!}
                    {!! Form::date('ticket_due',null, ['class' => 'form-control']) !!}
                </div>

                <input type="hidden" name="ticket_priority" value="">
                <input type="hidden" name="ticket_status" value="1">
                <input type="hidden" name="ticket_assign" value="">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection
