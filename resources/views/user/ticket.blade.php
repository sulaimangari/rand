@extends('user.layout')

@section('style')
{{-- <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
--}}
<link rel="stylesheet" href="{{ asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet"
    href="{{ asset('https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css')}}">
<link rel="stylesheet"
    href="{{ asset('https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css')}}">



<style>
    .dataTables_filter {
        text-align: right;
    }
</style>
@endsection
@section('content')

<section class="content-header">
    <h1>
        Ticket
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-12">
            @if(session()->get('message'))
            <div class="callout callout-success">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="pull-right">
                        <a href="{{ route('createTicket') }}" class="btn btn-block btn-success"><i
                                class="fa fa-plus"></i>
                            Add New Ticket </a>
                    </div>
                </div>

                <div class="box-body">
                    <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Created at</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $item)
                            <tr class="item">
                                <td>{{{ $item->ticket_room }}}</td>
                                <td>{{ $item->ticket_desc }}</td>
                                <td>{{ $item->ticket_type }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->ticket_due }}</td>
                                <td>@if($item->ticket_status == 1)
                                    <span class="badge bg-yellow"> Open </span>
                                    @elseif($item->ticket_status == 2)
                                    <span class="badge bg-blue"> Ongoing </span>
                                    @elseif($item->ticket_status == 3)
                                    <span class="badge bg-green"> Finish </span>
                                    @else
                                    <span class="badge bg-grey"> Closed </span>
                                    @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

{{-- <script>
    $(document).on('click','#delete',function(){
        var ID=$(this).attr('data-id');
        $('#app_id').val(ID);
    });
</script> --}}

<script src="{{ asset('vendor/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js')}}"></script>

<script src="{{ asset('vendor/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('vendor/AdminLTE/bower_components/fastclick/lib/fastclick.js')}}"></script>

<script>
    $(function () {
        var table = $('#myTable').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'responsive'  : true
        });
        new $.fn.dataTable.FixedHeader( table );
    });
</script>

@endsection
