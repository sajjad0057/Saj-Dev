@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="text-right mb-4">
                <a href="{{ route('add.slide') }}" class="btn btn-outline-success"> ADD SLIDE </a>

            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i>{{ session('success') }}</i>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif
                    <div class="card">
                        <div class="card-header text-center">
                            All Slide
                        </div>
                    </div>
                    {{-- {{var_dump($brands);}} --}}
                    <table class="table table-striped table-hover text-center">
                        <col style="width:5%">
                        <col style="width:10%">
                        <col style="width:40%">
                        <col style="width:15%">
                        <col style="width:5%">
                        <col style="width:25%">
                        <thead>
                            <tr>
                                <th scope="col">Sl NO</th>
                                <th scope="col">Slide Title</th>
                                <th scope="col">Slide Description</th>
                                <th scope="col">Slide Image</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <th scope="row">{{ $slide->id}}</th>
                                    <td>{{ $slide->title }}</td>
                                    <td>{{ $slide->description }}</td>
                                    <td>
                                        <center>
                                            <img src="{{ asset($slide->slide_image) }}" alt="image"
                                                style="height: 40px; width:70px;">
                                        </center>
                                    </td>
                                    <td>{{ $slide->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('slide.edit', ['id' => $slide->id]) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('slide.delete', ['id' => $slide->id]) }}"
                                           class="btn btn-outline-danger"
                                           onclick="return confirm('Are You Sure to Delete this Slide ..?')"
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
 
 
            </div>
        </div>

    </div>
@endsection