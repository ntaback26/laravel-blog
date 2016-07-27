<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    /**
     * Get the user for the post comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    /**
     * Get the post for the post comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Post', 'pid', 'id');
    }
}
