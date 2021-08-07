@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i>{{ session('success') }}</i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header text-center">
                            All Picture
                        </div>
                    </div>
                    <div class="card-group">
                        @foreach ($images as $image)
                        <div class="col-md-4 mt-4">
                            <div class="card">
                                <img src="{{asset($image->image)}}" alt="image">

                            </div>
                        </div>
                            
                        @endforeach


                    </div>
                    
                    <div class="m-5">
                        {{ $images->links('vendor.pagination.bootstrap-4') }}
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Picture
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.multi.image') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-group">
                                    <label for="multi_image">Set Image</label>
                                    <input type="file" class="form-control" name="multi_image[]" multiple> <!-- here name="multi_image[]" set a array , that store multi image -->
                                    @error('multi_image')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Add Picture</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection