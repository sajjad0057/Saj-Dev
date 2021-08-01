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
                            <strong>Edit Brand</strong>
                            
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.update.brand',['id'=>$brand->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="old_img" value="{{$brand->brand_image}}">
                                <div class="mb-3 form-group ">
                                    <label class="mb-2 text-muted" for="brand_name">Update Brand Name</label>
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="brand_name"
                                    id="brand_name"
                                    value={{$brand->brand_name}}
                                    >
                                    @error('brand_name')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group m-3">
                                    <img src="{{asset($brand->brand_image)}}" alt="image" style="width: 350px;height:150px">
                                </div>
                                <div class="mb-3 form-group ">
                                    <label class="mb-2 text-muted" for="brand_image">Update Brand Image</label>
                                    <input 
                                    type="file" 
                                    class="form-control" 
                                    name="brand_image"
                                    id="brand_image"
                                    value={{$brand->brand_image}}
                                    >
                                    @error('brand_image')
                                        <span class="text-warning">{{ $message }}</span>
                                    @enderror
                                </div>
      
                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Update Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
