@extends('blog.layouts.master')

@section('content')
<!-- Posts -->
<section class="col-md-8">
	<!-- Post detail -->
	<article>
		<div class="post-heading text-center">
			<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}" class="post-title">{{$post->title}}</a>
			<p class="post-meta text-muted">
				By <span class="post-author">{{$post->user->name}}</span>
				&nbsp;&nbsp;•&nbsp;&nbsp;
				{{date('F d, Y ', strtotime($post->created_at))}}
			</p>
			@if (!empty($post->photo))
				<img src="upload/{{$post->photo}}">
			@endif
		</div>
		<p class="post-body">
			{!!$post->content!!}
		</p>
	</article>

	<!-- Post comments -->
	<article id="comments">
		<div class="line">
			<h2>Comments</h2>
		</div>
		@if (count($post->comments) == 0) 
			<h3 class="text-muted"><i>This post have no comments.</i></h3>
		@else
			@foreach($post->comments as $comment)
				<div class="entry">
					<h3>{{$comment->user->name}}</h3>
					<i class="text-muted">{{date('F d, Y h:m', strtotime($comment->created_at))}}</i>
					<p>{{$comment->content}}</p>
				</div>
			@endforeach
		@endif
	</article>

	<!-- Comment form -->
	<article id="comment-form">
		@if(Auth::check())
			<div class="line" style="margin-bottom:20px;">
				<h2>Leave a comment</h2>
			</div>
			<div id="commentMessage"></div>
			<form id="commentForm">
				<div class="form-group">
			    <label>Comment</label>
			    <textarea class="form-control" id="commentContent" rows="5"></textarea>
			  </div>
			  <button type="submit" class="btn btn-dark-cyan">Submit</button>
			  <input type="hidden" id="commentToken" value="{{csrf_token()}}">
			  <input type="hidden" id="commentAction" value="{{route('blog.comment.store', ['pid' => $post->id])}}">
			</form>
		@else
			<p>Please <a href="#" data-toggle="modal" data-target="#signinModal">sign in</a> or 
			<a href="#" data-toggle="modal" data-target="#signupModal">sign up</a> to comment this post.</p>
		@endif
	</article>
</section>
@endsection