@extends('admin.admin_master')
@section('admin')


    <div class="container">

        <div class="card card-default">
            <div class="card-header card-header-border-bottom justify-content-center">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form class="form-pill" action="">
                    <div class="form-group">

                        <input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Password">
                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" id="exampleFormControlPassword3"
                            placeholder="New Password">
                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" id="exampleFormControlPassword3"
                            placeholder="Confrim Password">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-outline-secondary">Save Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>




@endsection
