<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;

class BrandController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(4);
        
        return view('admin.brand.index', compact('brands'));
    }



    public function AddBrand(Request $request)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:64',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid()); //generate unique Id .
        // $img_ext = strtolower($brand_image->getClientOriginalExtension()); //to get file extension
        // $img_name = $name_gen . '.' . $img_ext; // string concate
        // $upload_location = 'image/brand/';
        // $last_img = $upload_location . $img_name;
        // $brand_image->move($upload_location, $img_name);


        //using image.intervention packages manage image size - 
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();//generate unique Id . and concate with  image extension .
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
        $last_img = 'image/brand/'.$name_gen ;



        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Brand Inserted Successfully !');
    }



    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }




    public function UpdateBrand(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'brand_name' => 'required|max:64',
            ]
        );

        $old_img = $request->old_img;

        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            //using image.intervention packages manage image size - 
            $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();//generate unique Id . and concate with  image extension .
            Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
            $last_img = 'image/brand/'. $name_gen ;

            unlink($old_img);  // remove old image 

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully !');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully !');
        }
    }



    public function DeleteBrand($id)
    {   
        $brand = Brand::find($id);
        $old_img = $brand->brand_image;
        unlink($old_img);
        $brand->delete();

         return Redirect()->back()->with("success","Brand Deleted Successfully !");
    }



}
