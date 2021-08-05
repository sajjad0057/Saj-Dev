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
                            All Brand
                        </div>
                    </div>
                    {{-- {{var_dump($brands);}} --}}
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Sl NO</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brand->id}}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        <center>
                                            <img src="{{ asset($brand->brand_image) }}" alt="image"
                                                style="height: 40px; width:70px;">
                                        </center>
                                    </td>
                                    <td>{{ $brand->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('brand.edit', ['id' => $brand->id]) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('brand.delete', ['id' => $brand->id]) }}"
                                           class="btn btn-outline-danger"
                                           onclick="return confirm('Are You Sure to Delete this Brand ..?')"
                                           >

                                            delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                  

                    {{-- {{ $brands->links() }} --}}

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 form-group">
                                    <input type="text" class="form-control" placeholder="Brand Name" name="brand_name">
                                    @error('brand_name')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="brand_image">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image">
                                    @error('brand_image')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Add Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection