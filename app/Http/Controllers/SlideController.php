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


    public function EditSlide($id)
    {
        $slide = Slider::find($id);
        return view('admin.slider.edit', compact('slide')); 
    }

    public function UpdateSlide(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'slide_title' => 'required|min:4',
                'slide_description' => 'required',
            ]
        );

        $old_img = $request->old_img;
        $slide_image = $request->file('slide_image');

        if($slide_image){
        //using image.intervention packages manage image size - 
        $name_gen = hexdec(uniqid()).'.'.$slide_image->getClientOriginalExtension();//generate unique Id . and concate with  image extension .
        Image::make($slide_image)->resize(1920,1080)->save('image/slide/'.$name_gen);
        $last_img = 'image/slide/'.$name_gen ;

        unlink($old_img);


        Slider::find($id)->update([
            'title' => $request->slide_title,
            'description' => $request->slide_description,
            'slide_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('all.slide')->with('success', 'Slide Updated Successfully !');
        }else{

            Slider::find($id)->update([
                'title' => $request->slide_title,
                'description' => $request->slide_description,
                'created_at' => Carbon::now()
            ]);

        return Redirect()->route('all.slide')->with('success', 'Slide Updated Successfully !');

        }


    }


    public function DeleteSlide($id)
    {
        $slide = Slider::find($id);

        unlink($slide->slide_image);
        $slide->delete();

         return Redirect()->back()->with("success","Slide Deleted Successfully !");
    }



}
