@extends('global')
@section('title')Edit Profil @endsection
@section('content')
    <div class="spacefromhead"></div>
    <div class="container">
        <div class="container">
            <h1>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="photo-profile">
                            <img src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}" class="avatar img-circle w-100" alt="avatar">
                        </div>
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="form-control" form="editProfileForm">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>

                    <form class="form-horizontal" role="form" id="editProfileForm">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" value="{{\Illuminate\Support\Facades\Auth::user()->username}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="button" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection