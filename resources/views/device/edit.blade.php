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
        <div class="col-md-5">
            {!! Form::open(['url' => route('updateDevice'), 'method' => 'post']) !!}
            {!! csrf_field() !!}
            {!! Form::hidden('id', $data->id ) !!}
            <div class="form-group">
                {!! Form::label('device_code', 'Device Code :') !!}
                {!! Form::text('device_code',$data->device_code, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('device_name', 'Device Name :') !!}
                {!! Form::text('device_name',$data->device_name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('device_type', 'Device Type :') !!}
                {!! Form::text('device_type',$data->device_type, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('device_specs', 'Device specs :') !!}
                <textarea class="form-control" id="p_mdesc" name="device_specs">
                                {!! $data->device_specs !!}
                        </textarea>
            </div>

            <div class="form-group">
                {!! Form::label('device_location', 'Device location :') !!}
                {!! Form::text('device_location',$data->device_location, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('device_in', 'Date in :') !!}
                <input type="date" class="form-control" name="device_in"
                    value="{{ old($data->device_in, date('Y-m-d')) }}">
                {{-- {!! Form::date('device_in',old($data->device_in), ['class' => 'form-control']) !!} --}}
            </div>

            <div class="form-group">
                <label for="device_status"> Status Device: </label>
                <select name="device_status" class="form-control">
                    <option value="1"> Available </option>
                    <option value="2"> Borrowed </option>
                    <option value="3"> Broken </option>
                </select>
            </div>

            {!! Form::submit('Save', ['class' => 'btn btn-success btn-flat']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('vendor/laravel-ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'p_mdesc', {
 });
</script>
@endsection
