<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post; 
class PostController extends Controller
{
    public function create()
    {
        // Fetch all posts from the database
        $posts = Post::latest()->get();
    
        // Pass the posts to the view
        return view('dashboard.posts.create', compact('posts'));
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
    
    

    
   /* public function edit($id)
    {
        // Fetch the post to be edited
        $post = Post::findOrFail($id);
    
        // Return the edit view with the post data
        return view('dashboard.posts.edit', compact('post'));
    }*/
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $content = $post->content ? explode("\n\n", $post->content) : []; // Split by double line breaks
    
        return view('dashboard.posts.edit', compact('post', 'content'));
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
    
        // Redirect to the create page with a success message
        return redirect()->route('posts.create')->with('success', 'Post updated successfully!');
    }
    
    
  /*  public function update(Request $request, $id)
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
    }*/
    
    
   /* public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
    
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }*/
    public function destroy($id)
{
    $post = Post::findOrFail($id); // Ensure you fetch by ID
    $post->delete();

    return redirect()->route('posts.create')->with('success', 'Post deleted successfully.');
}

    public function index()
    {
        $posts = Post::latest()->get();
        return view('dashboard.posts.index', compact('posts')); // Use a separate view for listing posts
    }
    
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('dashboard.posts.create', compact('posts')); 
       // return view('reading', compact('posts'));// Use a show view for viewing a single post
    }
    public function showAllPosts()
    {
        $posts = Post::latest()->get(); // Retrieve all posts from the database
        return view('reading', compact('posts')); // Pass the $posts variable to the view
    }
    
    public function showFullPost($id)
{
    $post = Post::findOrFail($id);

    // Return the post as JSON
    return response()->json(['post' => $post]);
}

    
    

    

    
}


