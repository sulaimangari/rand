@extends('layout.master')

@section('style')
<style>
    .dataTables_filter {
        text-align: right;
    }
</style>

@endsection
@section('content')
<section class="content-header">
    <h1>
        Create Device
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Create Device </li>
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
        <div class="col-md-12">
            {!! Form::open(['url' => route('device.borrow.save'), 'method' => 'post']) !!}
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('id_device', 'Select Device :') !!}
                {!! Form::select('id_device', $device, null, ['class' => 'dropdown form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('name', 'Crew :') !!}
                {{-- {!! Form::text('crew_name',null, ['class' => 'form-control']) !!} --}}
                {!! Form::select('name', $user, null, ['class' => 'dropdown form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('borrow_date', 'Date in :') !!}
                {!! Form::date('borrow_date',null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-success btn-flat']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection
