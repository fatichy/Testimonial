<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index () {
        // only approved testimonials
        $testimonials = Testimonial::where('status', 'A')->get();
        return view('testimonials.index', ['testimonials' => $testimonials]);
    }

    public function store (Request $request){

       $fields=$request->validate([
            "titre"=>"required|max:60",
            "message"=>"required|max:300",
            "image" => "mimes:png,jpg,jpeg,docx,doc|max:1000"
            
        ]);

        if ($request->image) {
            $image = $request->file('image');
            $fileName =time().'-'.$request->titre. '.' .$request->image->extension();
            $image->storeAs('public/images', $fileName);
            $fields['image'] = $fileName;
        }

        $fields['status'] = "W";

        Testimonial::create($fields);

        return redirect()->back()->with('success', "témoignage en attente d'approbation");
    }

    // adminIndex returns all testimonials

    public function AdminIndex () {
        $testimonials = Testimonial::all();
        return view('admin.index', ['testimonials' => $testimonials]);
    }
    
    // update,delete, approve
    public function update (Testimonial $testimonial, Request $request){
        $fields=$request->validate([
            "titre"=>"required|max:60",
            "message"=>"required|max:300",
            "status"=>"required|in:W,A,R",
            "image" => "mimes:png,jpg,jpeg,docx,doc|max:1000"
        ]);

        
        if ($testimonial->image ) {
            $fields['image'] = $testimonial->image;
        }
        
        if ($request->image ) {
            $image = $request->file('image');
            $fileName =time().'-'.$request->titre. '.' .$request->image->extension();
            $image->storeAs('public/images', $fileName);
            $fields['image'] = $fileName;
        }
        $testimonial->update($fields);
        return redirect()->route('admin.index')->with('success', 'témoignage mis à jour .');
    }

    public function edit (Testimonial $testimonial){
        return view('testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function approve (Testimonial $testimonial){
        $testimonial->update(['status'=>"A"]);
        return redirect()->back()->with('success', 'témoignage approuvè.');
    }

    public function reject (Testimonial $testimonial){
        $testimonial->update(['status'=>"R"]);
        return redirect()->back()->with('success', 'témoignage rejeter.');
    }
    
    public function delete (Testimonial $testimonial){
        $testimonial->delete();
        return redirect()->back()->with('success', 'témoignage supprimer.');
    }
}
    

