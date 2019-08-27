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
        Device Borrowed List
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Device Borrowed List</li>
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
                        <a href="{{route('borrow.device.new')}}" class="btn btn-block btn-success"><i
                                class="fa fa-plus"></i> Add New Device </a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Crew Name</th>
                                <th>Device Name</th>
                                <th>Borrow date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="item">
                                <td>{{$item->crew_name}}</td>
                                <td>{{$item->device->device_name}}</td>
                                <td>{{$item->borrow_date}}</td>
                                <td>
                                    <button type="button" id="delete" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-danger" data-id="{{$item->id}}">
                                        return
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
    <div class="modal modal-warning fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Return Device</h4>
                </div>
                <div class="modal-body">
                    <h4>Device has returned?</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <form action="{{route('borrowBack')}}" method="POST" class="remove-record-model">
                        {{ csrf_field() }}
                        <input type="hidden" , name="id" id="app_id">
                        <button type="submit" class="btn btn-outline">Yes </button>
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
