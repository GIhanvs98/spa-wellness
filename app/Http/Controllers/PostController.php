<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post; 
class PostController extends Controller
{
    public function create()

    {
        
        return view('dashboard.posts.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:technology,health,education,lifestyle', // Validate category
            'content' => 'required|array', // Expecting an array of paragraphs
            'content.*' => 'required|string',
        ]);
    
        // Combine paragraphs into a single string with line breaks
        $combinedContent = implode("\n\n", $validated['content']);
    
        // Save the post to the database
        Post::create([
            'title' => $validated['title'],
            'category' => $validated['category'], // Save the category
            'content' => $combinedContent,
        ]);
    
        // Redirect with success message
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }
    

    
    public function edit($id)
    {
        // Fetch the post to be edited
        $post = Post::findOrFail($id);
    
        // Return the edit view with the post data
        return view('dashboard.posts.edit', compact('post'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required|array',
            'content.*' => 'required|string|max:1000',
        ]);
    
        // Find the post and update it
        $post = Post::findOrFail($id);
        $post->title = $validated['title'];
        $post->category = $validated['category'];
        $post->content = implode("\n", $validated['content']); // If you are storing paragraphs as one field
        $post->user_id = auth()->id(); // Update user_id if necessary
        $post->save();
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    
    
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
    
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
    public function index()
{
    $posts = Post::latest()->get();
    return view('dashboard.posts.create', compact('posts'));
}

public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('knowledge-area.show', compact('post'));
}

    
}


