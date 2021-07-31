<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(4);
        return view('admin.brand.index',compact('brands'));
    }

    public function AddBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:64',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],

        );

        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid()); //generate unique Id .
        $img_ext = strtolower($brand_image->getClientOriginalExtension()); //to get file extension
        $img_name = $name_gen.'.'.$img_ext; // string concate
        $upload_location = 'image/brand/';
        $last_img = $upload_location.$img_name;
        $brand_image->move($upload_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success','Brand Inserted Successfully !');
    }
}
