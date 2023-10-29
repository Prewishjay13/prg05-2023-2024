<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PostModel;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('posts.index', [
            'posts' => PostModel::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
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
         $formInputs = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('posts', 'company')],
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required'
        ]);
        
        // if($request->hasFile('logo')) {
        //     $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $formInputs['user_id'] = auth()->id();

        PostModel::create($formInputs);

        return redirect('/')->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostModel $id)
    {
           return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostModel $id)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostModel $post)
    {
        //  // Make sure logged in user is owner of this post
        if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formInputs = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'tags' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'description' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        //     $formInputs['logo'] = $request->file('logo')->store('logos', 'public');
        // }

        $post->update($formInputs);

        return back()->with('message', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostModel $post)
    {
          if($post->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $post->delete();
        return redirect('/')->with('message', 'Post deleted');
    // }
    
    //    // Manage Posts
    public function manage() {
        return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
}
