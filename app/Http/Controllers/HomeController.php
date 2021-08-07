<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AllData()
    {
        $brands = Brand::all();
        $abouts = About::all();
        $images = Multipic::all();

        return view('home',compact('brands','abouts','images'));
    }
}
