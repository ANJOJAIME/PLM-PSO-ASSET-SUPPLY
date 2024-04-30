<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function register()
    {
        return response()
            ->view('pages.login.register')
            ->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0")
            ->header("Cache-Control", "post-check=0, pre-check=0")
            ->header("Pragma", "no-cache");
    }
    
    public function registerPost(Request $request)
    {
        $user = new User();

        $user->first_name = $request->first_name;
        $user->password = Hash::make($request->password); //password

        $user->save();

        return back()->with('success', 'User created successfully.');
    }
    public function login($portal)
    {
        return response()
            ->view('pages.login.login', ['portal' => $portal])
            ->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0")
            ->header("Cache-Control", "post-check=0, pre-check=0")
            ->header("Pragma", "no-cache");
    }
    public function loginPost(Request $request)
    {
        $credentials = [
            'first_name' => $request->first_name,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            // Redirect to the selected portal
            if ($request->portal === 'asset') {
                return redirect('/asset-view')->with('success', 'Login successful.');
            } else if ($request->portal === 'supply') {
                return redirect('/supplies-view')->with('success', 'Login successful.');
            }
        }

        return back()->with('error', 'Invalid login credentials.');
    }
    
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('login');
    }
}
