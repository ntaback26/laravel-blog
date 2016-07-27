<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Show comments by post ID
     *
     * @param int $pid post ID
     * @return Response
     */
    public function index($pid) 
    {	
		$post = Post::find($pid);
		return view('admin.comment.index', ['post' => $post]);
    }

    /**
     * Delete a comment
     *
     * @param  int $id comment ID
     * @return Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('admin.comment.index', ['id' => $comment->post->id])->with('message', 'Delete comment successfully!');
    }
}