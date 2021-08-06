@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="text-right mb-4">
                <a href="{{ route('add.about') }}" class="btn btn-outline-success"> ADD ABOUT </a>

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
                            ABOUTS TABLE
                        </div>
                    </div>
                    {{-- {{var_dump($brands);}} --}}
                    <table class="table table-striped table-hover text-center">
                        <col style="width:3%">
                        <col style="width:7%">
                        <col style="width:20%">
                        <col style="width:50%">
                        <col style="width:20%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $about)
                                <tr>
                                    <th scope="row">{{ $about->id}}</th>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->short_description }}</td>
                                    <td>{{ $about->long_description }}</td>
                                    <td>
                                        <a href="{{ route('about.edit', ['id' => $about->id]) }}"
                                            class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <a href="{{ route('about.delete', ['id' => $about->id]) }}"
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
                </div>
 
 
            </div>
        </div>

    </div>
@endsection