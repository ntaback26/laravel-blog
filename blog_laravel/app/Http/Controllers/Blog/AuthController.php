<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Response;
use App\Http\Controllers\Controller;

use App\User;

class AuthController extends Controller
{
    /**
     * Index page
     *
     * @param ajax $request login form data
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
        ];

        if (Auth::attempt($checker)) {
            $response = ['status' => 'success'];
        } else {
            $response = ['status' => 'error'];
        }

        return response()->json($response);
    }

    /**
     * Register
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request) 
    {   
        $this->validate($request, [
            'name' => 'required|min:5|max:25',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:5|max:25',
            'password2' => 'same:password'
        ], [
            'password2.same' => 'Confirm password not match'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'member';

        $user->save();

        $response = ['status' => 'success'];
        return response()->json($response);
    }

    /**
     * Log out
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('blog.page.index');
    }
}
