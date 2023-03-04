<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        return view('user/edit', [
            'user' => $request->user(),
        ]);
    }
}
