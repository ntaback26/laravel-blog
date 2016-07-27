<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) { 
            $post->comments()->delete();
        });
    }


    /**
     * Get the user for the blog post.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'pid', 'id');
    }
}
