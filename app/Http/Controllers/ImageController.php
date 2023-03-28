<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    // View to upload image
    public function index() {
        return view ('components.form.image');
    }

    // Store image
    public function store(Request $request) {
        
        // Allowed file types: jpeg, png, jpg, webp
        // Max file size: 2MB
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Rename image to current timestamp
        $imageName = time().'.'.$request->image->extension();  
        // Move image to public/images
        $request->image->move(public_path('images/users'), $imageName);

        // Create path to image
        $imagePath = 'images/users/'.$imageName;

        // Store image path in session
        $request->session()->put('temp_image_filepath', $imagePath);

        // Return back with success message and image name
        return back()
            ->with('success','Image uploaded successfully!')
            ->with('image',$imageName);
    }
}
