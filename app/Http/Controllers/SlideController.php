<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;

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
}
