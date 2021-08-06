<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    
    public function __construct()
    {   

        
        $this->middleware('auth');
    }


    public function AllAbout()
    {   

        $abouts = About::latest()->get();
        return view('admin.about.about',compact('abouts'));
    }


    public function AddAbout()
    {
        return view('admin.about.add');
    }


    public function StoreAbout(Request $request)
    {
        $about = new About;
        $about->title = $request->about_title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->save();
        return Redirect()->route('all.about')->with('success','About info Inserted Successfully!');

    }


    public function EditAbout($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
    }


    public function UpdateAbout(Request $request,$id)
    {
        About::find($id)->update([
            'title' => $request->about_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

        ]);
        return Redirect()->route('all.about')->with('success','About info Updated Successfully!');
    }


    public function DeleteAbout($id)
    {
        About::find($id)->delete();
        return Redirect()->route('all.about')->with('success','About info Deleted Successfully!');
    }


}
