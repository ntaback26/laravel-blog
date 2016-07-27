<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Comment;

class PageController extends Controller
{		
	public function __construct()
	{
		// Share 3 latest posts and comments to sidebar of all views
		$recentPosts = Post::orderBy('id', 'desc')->take(3)->get();
		$recentComments = Comment::orderBy('id', 'desc')->take(3)->get();
		view()->share([
			'recentPosts' => $recentPosts, 
			'recentComments' => $recentComments
		]);
	}

	/**
     * Index page
     *
     * @return Response
     */
    public function index() 
    {
		$posts = Post::paginate(5);

		return view('blog.page.index', ['posts' => $posts]);
    }

    /**
     * Post page
     *
     * @param int $id post ID
     * @return Response
     */
    public function post($id) 
    {	
		$post = Post::find($id);

		return view('blog.page.post', ['post' => $post]);
    }

    /**
     * Search
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request) 
    {   
        $keyword = $request->keyword;
        
        if (empty($keyword)) {
            return redirect()->route('blog.page.index');
        }

        $posts = Post::where('title', 'like', "%$keyword%")
                     ->orWhere('slug', 'like', "%$keyword%")
                     ->orWhere('summary', 'like', "%$keyword%")
                     ->orWhere('content', 'like', "%$keyword%")
                     ->paginate(5);

        return view('blog.page.search', ['keyword' => $keyword, 'posts' => $posts]);
    }
}
