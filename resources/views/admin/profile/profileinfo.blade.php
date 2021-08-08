@extends('admin.admin_master')
@section('admin')


    <div class="container">

        <div class="card card-default">
            @if (session('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i>{{ session('success') }}</i>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif
            <div class="card-header card-header-border-bottom justify-content-center">
                <h2 class="text-muted">Profile Info</h2>
            </div>
            <div class="card-body" >
                <form class="form-pill" action="{{ route('update.profile') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">User name</label>
                        <input type="text" class="form-control" name="name"  value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email"  value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group m-3">
                        <img src="{{$user->profile_photo_path }}" alt="image" style="width: 350px;height:150px">
                        <input type="hidden" name="old_image" value={{$user->profile_photo_url}}>
                    </div>
                    <div class="form-group">
                        <label for="pro_pic">Profile Picture</label>
                        <input type="file" class="form-control" name="pro_pic">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">Save Profile Info</button>
                    </div>
                </form>
            </div>

        </div>
    </div>




@endsection