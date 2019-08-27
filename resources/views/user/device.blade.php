@extends('user.layout')

@section('style')

@endsection
@section('content')
<section class="content-header">
    <h1>
        Device
    </h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Device Code</th>
                        <th>Device Name</th>
                        <th>Borrowed Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($device as $item)
                    <tr class="item">
                        <td>{{ $item->device_code }}</td>
                        <td>{{ $item->device_name }}</td>
                        <td>{{ $item->borrow_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@endsection
