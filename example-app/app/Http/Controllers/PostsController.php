<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Like; 
use App\Models\User;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Post::distinct('tags')->pluck('tags')->flatMap(function($tag) {
            return explode(',', $tag);
        })->unique()->values();
         
        return view('posts.index', [
            'posts' => Post::latest()->filter(['tag' => request('tag'), 'search' => request('search')])->paginate(5),
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $user = Auth::user();

        // // Check if the user has liked enough posts
        // if (!$user->userHasLikedEnoughPosts($user)) {
        //     $remainingLikes = 5 - $user->likes()->count();

        //     return view('posts.create', [
        //         'remainingLikes' => $remainingLikes,
        //     ]);
        // }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userLikesCount = auth()->user()->likes_given;
        if ($userLikesCount < 10) {
            return redirect('/')->with('message', 'Je moet minimaal 10 likes geven voordat je een post kunt toevoegen.');
        }

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

        Post::create($formInputs);

        return redirect('/')->with('message', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
           return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //  // Make sure logged in user is owner of this post
        if($post->user_id != auth()->id() && !auth()->user()->is_admin) {
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
    public function destroy(Post $post)
    {
          if($post->user_id != auth()->id() && !auth()->user()->is_admin) {
            abort(403, 'Unauthorized Action');
        }
        
        $post->delete();
        return redirect('/')->with('message', 'Post deleted');
     }
    
    //    // Manage Posts
    public function manage() {
        $posts = auth()->user()->posts()->get();
        return view('posts.manage', ['posts' => $posts]);
    }

    public function deactivate(Request $request, Post $post){
        // Zorg ervoor dat de huidige gebruiker eigenaar is van de post of een admin is voordat je deze deactiveert
        if ($post->user_id == auth()->id() || auth()->user()->is_admin) {
            $this->toggleActiveStatus($post, 0);
            return back()->with('message', 'Post has been deactivated!');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }
    
    public function activate(Request $request, Post $post){
        // Zorg ervoor dat de huidige gebruiker eigenaar is van de post of een admin is voordat je deze activeert
        if ($post->user_id == auth()->id() || auth()->user()->is_admin) {
            $this->toggleActiveStatus($post, 1);
            return back()->with('message', 'Post has been activated!');
        } else {
            abort(403, 'Unauthorized Action');
        }
    }
    
    protected function toggleActiveStatus(Post $post, $status){
        
        $post->update(['status' => $status]);
    }

    public function addLike(Post $post)
    {
        // Controleer of de gebruiker de post al heeft geliket
        $user = auth()->user();

        if (!$user->likedPosts->contains($post->id)) {
            // Voeg like toe
            $post->addLike();

            // Verhoog likes_given van de gebruiker
            $user->increment('likes_given');

            return back()->with('success', 'Like toegevoegd!');
        } else {
            return back()->with('error', 'Je hebt deze post al geliket!');
        }
    }

    public function adminManage() {
        $posts = Post::latest()->paginate(5);
        return view('posts.admin_manage', compact('posts'));
    }
}
