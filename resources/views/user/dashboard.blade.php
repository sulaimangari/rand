@extends('user.layout')

@section('style')

@endsection
@section('content')
<section class="content-header">
    <h1>
        Dashboard
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $countTicket }}</h3>

                    <p>Your Tickets</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pricetag"></i>
                </div>
                <a href="{{ route('ticketUser') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $countDevice }}</h3>

                    <p>Device</p>
                </div>
                <div class="icon">
                    <i class="ion ion-laptop"></i>
                </div>
                <a href="{{ route('deviceUser') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
</section>


@endsection
