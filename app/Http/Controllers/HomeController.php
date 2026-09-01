<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('index', compact('testimonials'));
    }
}
