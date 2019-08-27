@extends('layout.master')

@section('style')

@endsection

@section('content')
<section class="content-header">
    <h1>
        Manage Admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">User Management </li>
        <li class="active">Manage admin</li>
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
        <div class="col-md-3">
            <div class="box">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle"
                        src="https://www.gravatar.com/avatar/edb0e96701c209ab4b50211c856c50c4.jpg?s=80&amp;d=mm&amp;r=g">
                    <h3 class="profile-username text-center">admin</h3>
                </div>

                <ul class="nav nav-pills nav-stacked">

                    <li role="presentation" class="active"><a href="{{ route('adminUser') }}">Update Account Info</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-md-6">

            <form class="form" action="{{ route('storeAdmin') }}" method="post">
                @csrf

                {{-- <input type="hidden" name="id" value="1"> --}}

                <div class="box padding-10">

                    <div class="box-body backpack-profile-form">

                        <div class="form-group">
                            <label class="required">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label class="required">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label class="required">New Password</label>
                            <input autocomplete="new-password" required="" class="form-control" type="password"
                                name="password" value="">
                        </div>

                        <div class="form-group m-b-0">
                            <button type="submit" class="btn btn-success"><span class="ladda-label"><i
                                        class="fa fa-save"></i> Save</span></button>
                            <a href="{{ route('adminUser') }}" class="btn btn-default"><span
                                    class="ladda-label">Cancel</span></a>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>

</section>

@endsection
