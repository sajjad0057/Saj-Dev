<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AllData()
    {
        $brands = Brand::all();
        $abouts = About::all();

        return view('home',compact('brands','abouts'));
    }
}
