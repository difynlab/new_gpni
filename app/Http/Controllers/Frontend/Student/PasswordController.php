<?php

namespace App\Http\Controllers\Frontend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function index()
    {
        return view('frontend.student.change-password');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ], [
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 8 characters long',
            'confirm_password.required' => 'The confirm password field is required',
            'confirm_password.same' => 'The confirm password must match the password',
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Password update failed!');
        }
        
        $user = Auth::user();
        $user->password = $request->password;
        $user->save();

        Auth::logout();

        return redirect()->back()->with('success', 'Successfully updated!');
    }

}