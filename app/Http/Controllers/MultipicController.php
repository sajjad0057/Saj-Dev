<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Image;

class MultipicController extends Controller
{
    // handle multi image all method 

    public function MultiImage()
    {

        $images = Multipic::latest()->paginate(6);
        return view('admin.multipic.index', compact('images'));
    }


    public function AddMultiImage(Request $request)
    {
        
        $images = $request->file('multi_image');
        foreach ($images as $img) {

            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(400, 300)->save('image/multipic/'.$name_gen);
            $last_image = 'image/multipic/'.$name_gen;

            Multipic::insert([
                'image' => $last_image,
                'created_at' => Carbon::now(),
            ]);
        } // end foreach

        return Redirect()->back()->with('success','Images are inserted successfully !');
    }
}
