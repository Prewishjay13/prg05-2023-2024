<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  return view('posts.index', [
        //     'posts' => Post::latest()->filter(request(['tag', 'search']))->paginate(6)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  $formFields = $request->validate([
        //     'title' => 'required',
        //     'company' => ['required', Rule::unique('listings', 'company')],
        //     'location' => 'required',
        //     'website' => 'required',
        //     'email' => ['required', 'email'],
        //     'tags' => 'required',
        //     'description' => 'required'
        // ]);
        
        // if($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        //  $formFields['user_id'] = auth()->id();

        // Post::create($formFields);

        // return redirect('/')->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //    return view('posts.show', [
        //     'post' => $post
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  // Make sure logged in user is owner of this post
        // if($post->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }
        
        // $formFields = $request->validate([
        //     'title' => 'required',
        //     'company' => ['required'],
        //     'location' => 'required',
        //     'website' => 'required',
        //     'email' => ['required', 'email'],
        //     'tags' => 'required',
        //     'description' => 'required'
        // ]);

        // if($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        // $listing->update($formFields);

        // return back()->with('message', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    //       if($post->user_id != auth()->id()) {
    //         abort(403, 'Unauthorized Action');
    //     }
        
    //     $post->delete();
    //     return redirect('/')->with('message', 'Post deleted');
    // }
    
    //    // Manage Listings
    // public function manage() {
    //     return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}
