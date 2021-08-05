<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


use Image;

class SlideController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllSlide()
    {
        $slides = Slider::all();
        
        return view('admin.slider.index', compact('slides'));
    }


    public function AddSlide()
    {
        return view('admin.slider.add');
    }


    public function StoreSlide(Request $request)
    {
        $validated = $request->validate(
            [
                'slide_title' => 'required|min:4',
                'slide_description' => 'required',
                'slide_image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $slide_image = $request->file('slide_image');

        // $name_gen = hexdec(uniqid()); //generate unique Id .
        // $img_ext = strtolower($brand_image->getClientOriginalExtension()); //to get file extension
        // $img_name = $name_gen . '.' . $img_ext; // string concate
        // $upload_location = 'image/brand/';
        // $last_img = $upload_location . $img_name;
        // $brand_image->move($upload_location, $img_name);


        //using image.intervention packages manage image size - 
        $name_gen = hexdec(uniqid()).'.'.$slide_image->getClientOriginalExtension();//generate unique Id . and concate with  image extension .
        Image::make($slide_image)->resize(1920,1080)->save('image/slide/'.$name_gen);
        $last_img = 'image/slide/'.$name_gen ;



        Slider::insert([
            'title' => $request->slide_title,
            'description' => $request->slide_description,
            'slide_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.slide')->with('success', 'Slide Inserted Successfully !');
    }


    public function EditSlide()
    {
        # code...
    }

    public function UpdateSlide()
    {
        # code...
    }


    public function DeleteSlide()
    {
        # code...
    }



}
