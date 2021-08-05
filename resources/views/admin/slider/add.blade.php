@extends('admin.admin_master')
@section('admin')


<div class="py-12">


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        Add Slide
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.slide') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">
                                <input type="text" class="form-control" placeholder="Slide Title" name="slide_title">
                                @error('slide_title')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <textarea type="text" class="form-control text-muted" placeholder="Slide Description" name="slide_description"></textarea>
                                @error('slide_description')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="brand_image">Slide Image</label>
                                <input type="file" class="form-control" name="slide_image">
                                @error('slide_image')
                                    <span class="text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-secondary">Add Slide</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        </div>

</div>



    
@endsection