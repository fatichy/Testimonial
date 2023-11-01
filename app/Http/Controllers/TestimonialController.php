<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index () {
        return view('testimonials.index');
    }

    public function store (Request $request){

       $fields=$request->validate([
            "titre"=>"required|max:60",
            "message"=>"required|max:300",
            "image" => "mimes:png,jpg,jpeg,docx,doc|max:1000"
            
        ]);

        
        $image = $request->file('image');
        $fileName =time().'-'.$request->titre. '.' .$request->image->extension();
        $image->storeAs('public/images', $fileName);


        $fields['image']=$fileName;
        $fields['status']='test';

        
        Testimonial::create($fields);
        return "success";
    }
}

