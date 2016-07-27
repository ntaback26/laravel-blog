<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;

class PostController extends Controller
{
		/**
     * Show list of posts
     *
     * @return Response
     */
    public function index() 
    {	
		$posts = Post::orderBy('id', 'desc')->get();
		return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show a form for creating new post
     *
     * @return Response
     */
    public function create() 
    {	
		return view('admin.post.create');
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
	        'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'photo' => 'mimes:jpeg,bmp,png'
	    ]);

		$post = new Post;
		$post->title = $request->title;
		$post->slug = str_slug($request->title);
		$post->summary = $request->summary;
		$post->content = $request->content;
        $post->uid = Auth::user()->id;

		if ($request->hasFile('photo')) {
			$file = $request->file('photo');
			$destinationPath = 'upload/';
			$photo = $file->getClientOriginalName();
			if (file_exists(public_path($destinationPath.$photo))) {
				return redirect()->back()->withInput()->withErrors(['File already exists']);
			} else {
				$file->move($destinationPath, $photo);
				$post->photo = $photo;
			}
		} else {
			$post->photo = '';
		}

		$post->save();

		return redirect()->route('admin.post.index')->with('message', 'Create post successfully!');
    }

    /**
     * Show a form for editing a post
     *
     * @param int $id post ID
     * @return Response
     */
    public function edit($id) 
    {	
		$post = Post::find($id);
		return view('admin/post/edit', ['post' => $post]);
    }

    /**
     * Update a post
     *
     * @param Request $request
     * @param int $id post ID
     * @return Response
     */
    public function update(Request $request, $id) 
    {		
		$this->validate($request, [
	        'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'photo' => 'mimes:jpeg,bmp,png'
	    ]);

		$post = Post::find($id);
		$post->title = $request->title;
		$post->slug = str_slug($request->title);
		$post->summary = $request->summary;
		$post->content = $request->content;

		if ($request->hasFile('photo')) {
			$file = $request->file('photo');
			$destinationPath = 'upload/';
			$photo = $file->getClientOriginalName();
			if (file_exists($destinationPath.$photo) && ($photo != $post->photo)) {
				return redirect()->back()->withInput()->withErrors(['File already exists']);
			} else {
				unlink($destinationPath.$post->photo);
				$file->move($destinationPath, $photo);
				$post->photo = $photo;
			}
		} 

		$post->save();

		return redirect()->route('admin.post.index')->with('message', 'Edit post successfully!');
    }

    /**
     * Delete a post
     *
     * @param  int $id post ID
     * @return Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.post.index')->with('message', 'Delete post successfully!');
    }
}