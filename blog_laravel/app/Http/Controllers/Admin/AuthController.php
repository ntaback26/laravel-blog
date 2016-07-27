<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Show a form to login into admin control panel
     *
     * @return Response
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    /**
     * Check login into admin control panel
     *
     * @param Request $request
     * @return Response
     */
    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $checker = [
            'email' => $request->email, 
            'password' => $request->password,
            'role' => 'admin'
        ];

        if (Auth::attempt($checker)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(['Email or password is invalid']);
        }
    }
}
