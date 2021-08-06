@extends('admin.admin_master')
@section('admin')


<div class="py-12">


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="text-muted">SET ABOUTS</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                                <input type="text" class="form-control" placeholder="About Title" name="about_title">
                                @error('about_title')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <textarea type="text" class="form-control text-muted" placeholder="Short Description" name="short_description"></textarea>
                                @error('short_description')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <textarea type="text" class="form-control text-muted" placeholder="Long Description" name="long_description"></textarea>
                                @error('long_description')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-secondary">ADD ABOUT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        </div>

</div>



    
@endsection