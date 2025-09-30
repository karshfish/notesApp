<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($validated, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect(route('notes.index'))->with('success', "Welcome " . auth()->user()->name);
        }
        return back()->withErrors(['email' => 'provided credentials do not exist. Please try again'])->onlyInput('email');
    }
}
