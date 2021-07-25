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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong>Edit Category</strong>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.update.category',['id'=>$category->id]) }}" method="POST">
                                @csrf
                                <div class="mb-3 form-group ">
                                    <label class="mb-2 text-muted" for="update_category">Update Category Name</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="update_category"
                                    id="update_category"
                                    value={{$category->category_name}}
                                    >
                                    @error('category_name')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Update Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
