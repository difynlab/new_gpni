<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\AuthenticationContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        $contents = AuthenticationContent::find(1);

        return view('frontend.auth.login', [
            'contents' => $contents
        ]);
    }

    public function store(Request $request)
    {
        $contents = AuthenticationContent::find(1);

        if(Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            if(Auth::user()->role == 'student') {
                $redirect_url = $request->redirect ?? route('frontend.dashboard.index');
        
                return redirect()->intended($redirect_url);
            }
        }

        return back()->withErrors([
            'contents' => $contents,
            'login_failed' => 'These credentials do not match our records',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('frontend.homepage');
    }
}
