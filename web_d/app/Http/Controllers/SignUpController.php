<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->nickname = $validatedData['nickname'];
        $user->password = $validatedData['password'];
        $user->save();


        return redirect('/')->with('success', 'Registration completed successfully!');
    }
}
