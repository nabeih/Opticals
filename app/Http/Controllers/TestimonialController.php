<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TestimonialController extends Controller
{
    //
    public function index()
    {
        return view('createTestmonial');
    }

    public function show()
    {
        $testimonials = Testimonial::latest()->get();;
        return view('testmonial', compact('testimonials'));
    }
    public function create(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'rating' => 'numeric|between:1,5'
        ]);

        Testimonial::create([
            'name' => $request->input('name'),
            'message' => $request->input('message'),
            'rating' => $request->rating
        ]);
        return redirect()->route('home', compact('request'))->with('success', 'تم إضافة الشهادة بنجاح!');
    }
}
