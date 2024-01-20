<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $tracks = FavoriteTracks::latest()->paginate(10);
        return view('tracks.admin_manage', compact('tracks'));
    }
}
