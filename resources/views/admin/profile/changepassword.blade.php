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
                <h2 class="text-muted">Change Password</h2>
            </div>
            <div class="card-body">
                <form class="form-pill" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="form-group">

                        <input type="password" class="form-control" id="current_password" name="oldpassword"
                            placeholder="Current Password">
                        @error('oldpassword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="New Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">Save Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
