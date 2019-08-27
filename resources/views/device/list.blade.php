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
        Device List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Device List</li>
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
                <div class="box-header">
                    <div class="pull-right">
                        <a href="{{route('createDevice')}}" class="btn btn-block btn-success"><i class="fa fa-plus"></i>
                            Add New Device </a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Device Code</th>
                                <th>Device Name</th>
                                <th>Device Type</th>
                                <th>Device Specs</th>
                                <th>Device Location</th>
                                <th>Device In</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $item)
                            <tr class="item">
                                <td>{{$item->device_code}}</td>
                                <td>{{$item->device_name}}</td>
                                <td>{{$item->device_type}}</td>
                                <td>{!!$item->device_specs!!}</td>
                                <td>{{$item->device_location}}</td>
                                <td>{{$item->device_in}}</td>
                                <td>
                                    @if($item->device_status == 1)
                                    <span class="badge bg-green"> Available </span>
                                    @elseif($item->device_status == 2)
                                    <span class="badge bg-yellow"> Borrowed </span>
                                    @else
                                    <span class="badge bg-red"> Broken </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('editDevice', ['id' => $item->id]) }}"
                                        class="btn btn-block btn-info"> <span class="glyphicon glyphicon-edit"></span>
                                        Edit </a>
                                    <button type="button" id="delete" class="btn btn-danger" data-toggle="modal"
                                        data-target="#modal-danger" data-id="{{$item->id}}">
                                        Delete
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
                    <h4>You Want You Sure Delete This Record ?</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('deleteDevice')}}" method="POST" class="remove-record-model">
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
@stop

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
@stop
