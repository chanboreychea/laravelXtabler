<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if (session('is_admin_logged_in')) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Please input the username',
            'password.required' => 'Please input the password'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == 'admin@gmail.com' && $password == "123") {
            $request->session()->pull('is_admin_logged_in');
            $request->session()->pull('admin_id');
            session([
                'is_admin_logged_in' => true,
                'admin_id' => "B0r3y!19",
                'login_at' => now()
            ]);
            return redirect('/dashboard');
        }

        return Redirect::route('admin-login');
    }

    public function logout(Request $request)
    {

        if ($request->session()->has('is_admin_logged_in')) {
            $request->session()->pull('is_admin_logged_in');
            $request->session()->pull('admin_id');
        }

        return Redirect::route('admin-login');
    }

    public function getViewChangePassword()
    {
        return view('auth.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8|regex:/[A-z]/|regex:/[0-9]/',
            'confirm_new_password' => 'required|same:new_password',
        ], [
            'password.required' => 'Please input your current password.',
            'new_password.required' => 'Please input a new password.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.regex' => 'The new password must contain an uppercase letter, a number, and a special character.',
            'confirm_new_password.required' => 'Please confirm your new password.',
            'confirm_new_password.same' => 'The confirmation password does not match.',
        ]);
    }
}
