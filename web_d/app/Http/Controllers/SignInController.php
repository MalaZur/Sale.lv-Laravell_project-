<?php

namespace App\Http\Controllers;

use App\Models\UserQuery;
use Illuminate\Http\Request;
use App\Models\User;

class SignInController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nickname' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('nickname', $validatedData['nickname'])->first();

        if ($user && $user->password === $validatedData['password']) {
            $request->session()->put('nickname', $user->nickname);
            $request->session()->put('user_id', $user->id); 
            return redirect('/')->with('success', 'Sign in completed successfully!');
        }

        return redirect()->back()->withErrors(['message' => 'Invalid nickname or password.']);
    }
    public function signOut(Request $request)
{
    $request->session()->forget('nickname'); // Сброс значения nickname
    $request->session()->forget('user_id'); // Сброс значения user_id
    return redirect('/')->with('success', 'Signed out successfully!');
}


}
