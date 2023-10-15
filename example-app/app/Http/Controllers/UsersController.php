<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('users.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // $formFields = $request->validate([
      //       'name' => ['required', 'min:3'],
      //       'email' => ['required', 'email', Rule::unique('users', 'email')],
      //       'password' => 'required|confirmed|min:6'
      //   ]);

      //   // Hash Password
      //   $formFields['password'] = bcrypt($formFields['password']);

      //   // Create User
      //   $user = User::create($formFields);

      //   // Login
      //   auth()->login($user);

      //   return redirect('/')->with('message', 'User created and logged in');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
