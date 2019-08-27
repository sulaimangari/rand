@extends( Auth::user()->hasRole('admin') ? 'layout.master' : 'user.layout' )

@section('style')

@endsection

@section('content')
<section class="content-header">
    <h1>
        Add Crew
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-5">
            <form method="post" action="{{route('storeUser')}}">
                @csrf

                <div class="form-group">
                    <label>Crew Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label>Crew Mail</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection
