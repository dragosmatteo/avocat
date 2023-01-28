<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Partner;
use App\Models\Work;
use App\Models\Service;
use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
  public function index(){
    $sliders = Slider::all();
    $testimonials = Testimonial::all();
    $partners = Partner::limit(10)->get();
    $services = Service::where('on_main', '1')->limit(6)->get();
    $features = Feature::all();

    return view('home.index',compact('sliders','testimonials','partners','services','features'));
  }
}
