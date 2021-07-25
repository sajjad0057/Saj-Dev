<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b class="text-muted"></b>
            <b style="float: right;">
            </b>
        </h2>
    </x-slot>

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
                            All Category
                        </div>
                    </div>
                    <table class="table table-striped table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Sl NO</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php($i = 1) --}} 
                            @foreach ($category as $item)
                                <tr>
                                    <th scope="row">{{ $category->firstItem()+$loop->index }}</th>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->userRel->name }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{route('category.edit',['id'=>$item->id])}}" class="btn btn-outline-warning">
                                            Edit
                                        </a>
                                        <a href="{{route('category.delete',['id'=>$item->id])}}" class="btn btn-outline-danger">
                                            delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $category->links() }}

                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Category Name"
                                        name="category_name">
                                    @error('category_name')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Add Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
