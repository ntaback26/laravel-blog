<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentController extends Controller
{
    /**
     * Store comment from client
     *
     * @param Request $request
     * @return Response
     */
    public function store($pid, Request $request) 
    {   
        $this->validate($request, [
            'content' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = $request->content;
        $comment->pid = $pid;
        $comment->uid = Auth::user()->id;

        $comment->save();

        $response = ['status' => 'success'];
        return response()->json($response);
    }
}
