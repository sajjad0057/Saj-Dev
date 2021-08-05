<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AllData()
    {
        $brands = Brand::all();

        return view('home',compact('brands'));
    }
}
