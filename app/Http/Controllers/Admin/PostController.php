<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post; // Adjust the namespace as per your application structure

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=[];
        $data['posts']=Post::all();
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'public/assets/images/blogs/' . $imageName; // Path relative to public folder
            $image->move(public_path('assets/images/blogs'), $imageName); // Move image to public/assets/images/blogs directory
            $imageUrl = asset($imagePath); // Generate URL for the image
        } else {
            // Handle case where image is required but not provided (should not happen with validation)
            return redirect()->back()->with('error', 'Image is required.');
        }

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->description;
            $post->image_url = $imageUrl; // Store the URL of the uploaded image

            // Save the post
            $post->save();
            return redirect()->route('posts.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id); // Assuming 'Post' is your model name

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID

        // Validate incoming request data
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB, nullable for optional image update
        ]);

        // Process image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'assets/images/blogs/' . $imageName; // Path relative to public folder
            $image->move(public_path('assets/images/blogs'), $imageName); // Move image to public/assets/images/blogs directory
            $imageUrl = asset($imagePath); // Generate URL for the image

            // Delete previous image if exists (optional, depending on your app logic)
            // Ensure to handle deletion properly, this is an example and may not fit all cases
            // if (File::exists(public_path($post->image_url))) {
            //     File::delete(public_path($post->image_url));
            // }
        } else {
            $imageUrl = $post->image_url; // Keep the existing image URL if no new image is provided
        }

        // Update the post with new data
        $post->title = $request->input('title');
        $post->content = $request->input('description');

        // Only update image_url if a new image was uploaded
        if (isset($imageUrl)) {
            $post->image_url = $imageUrl;
        }

        // Save the updated post
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID

        // Delete the post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
