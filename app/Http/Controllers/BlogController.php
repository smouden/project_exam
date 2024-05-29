<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }
    
    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $blogs = Blog::where('category_id', $id)->get();
        return view('blogs.blogByCategory', compact('blogs', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'picture_blog' => 'required|image',
            'first_paragraph' => 'required|string',
            'first_picture' => 'required|image',
            'two_picture' => 'nullable|image',
            'tree_picture' => 'nullable|image',
            'second_paragraph' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();

        // Handling the file uploads
        if ($request->hasFile('picture_blog')) {
            $data['picture_blog'] = $request->file('picture_blog')->move(public_path('images'), $request->file('picture_blog')->getClientOriginalName());
        }
        if ($request->hasFile('first_picture')) {
            $data['first_picture'] = $request->file('first_picture')->move(public_path('images'), $request->file('first_picture')->getClientOriginalName());
        }
        if ($request->hasFile('two_picture')) {
            $data['two_picture'] = $request->file('two_picture')->move(public_path('images'), $request->file('two_picture')->getClientOriginalName());
        }
        if ($request->hasFile('tree_picture')) {
            $data['tree_picture'] = $request->file('tree_picture')->move(public_path('images'), $request->file('tree_picture')->getClientOriginalName());
        }

        // Store the file paths in the database
        $data['picture_blog'] = 'images/' . $request->file('picture_blog')->getClientOriginalName();
        $data['first_picture'] = 'images/' . $request->file('first_picture')->getClientOriginalName();
        $data['two_picture'] = $request->hasFile('two_picture') ? 'images/' . $request->file('two_picture')->getClientOriginalName() : null;
        $data['tree_picture'] = $request->hasFile('tree_picture') ? 'images/' . $request->file('tree_picture')->getClientOriginalName() : null;

        // Add the current date and time and the authenticated user ID
        $data['date_blog'] = now();
        $data['user_id'] = auth()->id();

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::with('user', 'category')->findOrFail($id);
        return view('blogs.show', compact('blog'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date_blog' => 'required|date',
            'picture_blog' => 'nullable|image',
            'first_paragraph' => 'required|string',
            'first_picture' => 'nullable|image',
            'two_picture' => 'nullable|image',
            'tree_picture' => 'nullable|image',
            'second_paragraph' => 'required|string',
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->all();

        // Handling the file uploads
        if ($request->hasFile('picture_blog')) {
            $data['picture_blog'] = $request->file('picture_blog')->store('images', 'public');
        }
        if ($request->hasFile('first_picture')) {
            $data['first_picture'] = $request->file('first_picture')->store('images', 'public');
        }
        if ($request->hasFile('two_picture')) {
            $data['two_picture'] = $request->file('two_picture')->store('images', 'public');
        }
        if ($request->hasFile('tree_picture')) {
            $data['tree_picture'] = $request->file('tree_picture')->store('images', 'public');
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
