<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
	/**
     * Show list of users
     *
     * @return Response
     */
    public function index() 
    {	
		$users = User::all();
		return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show a form for creating new user
     *
     * @return Response
     */
    public function create() 
    {	
		return view('admin.user.create');
    }

    /**
     * Store new user
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) 
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
		$user->role = $request->role;

		$user->save();

		return redirect()->route('admin.user.index')->with('message', 'Create user successfully!');
    }

    /**
     * Show a form for editing user
     *
     * @param int $id user ID
     * @return Response
     */
    public function edit($id) 
    {      
        $user = User::find($id);

        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update an user
     *
     * @param Request $request
     * @param int $id user ID
     * @return Response
     */
    public function update(Request $request, $id) 
    {   
        $this->validate($request, [
            'name' => 'required|min:5|max:25',
            'email' => 'required|email|unique:user,email,'.$id
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if ($request->changePassword == 'on') {
            $this->validate($request, [
                'password' => 'required|min:5|max:25',
                'password2' => 'same:password'
            ], [
                'password2.same' => 'Confirm password not match'
            ]);

            $user->password = bcrypt($request->password);
        }
        
        $user->save();

        return redirect()->route('admin.user.index')->with('message', 'Edit user successfully!');
    }

    /**
     * Delete an user
     *
     * @param  int $id user ID
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('message', 'Delete user successfully!');
    }
}