@extends('layout.master')

@section('style')
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
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
        Ticket List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Support Ticket </li>
        <li class="active">Ticket List</li>
    </ol>
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
                <div class="box-body">
                    <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Crew</th>
                                <th>Room</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Due date</th>
                                <th>Type</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Assign</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $item)
                            <tr class="item">
                                <td>{{$item->id}}</td>
                                <td>{{$item->ticket_crew}}</td>
                                <td>{{$item->ticket_room}}</td>
                                <td>{{$item->ticket_desc}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->ticket_due}}</td>
                                <td>{{$item->ticket_type}}</td>
                                <td>@if($item->ticket_priority == 1)
                                    <span class="badge bg-green"> Low </span>
                                    @elseif($item->ticket_priority == 2)
                                    <span class="badge bg-yellow"> Medium </span>
                                    @elseif($item->ticket_priority == 3)
                                    <span class="badge bg-red"> Critical </span>
                                    @endif</td>
                                <td>@if($item->ticket_status == 1)
                                    <span class="badge bg-yellow"> Open </span>
                                    @elseif($item->ticket_status == 2)
                                    <span class="badge bg-blue"> Ongoing </span>
                                    @elseif($item->ticket_status == 3)
                                    <span class="badge bg-green"> Finish </span>
                                    @else
                                    <span class="badge bg-grey"> Closed </span>
                                    @endif</td>
                                <td>{{$item->ticket_assign}}</td>
                                <td>
                                    <a href="{{ route('editTicket', ['id' => $item->id]) }}" type="button"
                                        class="btn btn-success btn-md"> <span class="glyphicon glyphicon-edit"></span>
                                        Edit</a>
                                    <button type="button" id="delete" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-danger" data-id="{{$item->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Record</h4>
                </div>
                <div class="modal-body">
                    <h4>Are you sure to Delete This Record ?</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('destroyTicket')}}" method="POST" class="remove-record-model">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <input type="hidden" , name="id" id="app_id">
                        <button type="submit" class="btn btn-outline">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

<script>
    $(document).on('click','#delete',function(){
        var ID=$(this).attr('data-id');
        $('#app_id').val(ID);
    });
</script>

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
