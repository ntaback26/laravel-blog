@extends('blog.layouts.master')

@section('content')
<!-- Posts -->
<section class="col-md-8">
	<div class="alert alert-info" role="alert">
		Results for <strong>{{$keyword}}</strong> keyword ...
	</div>

	@foreach($posts as $post)
		<article>
			<div class="post-heading text-center">
				<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}" class="post-title">{{$post->title}}</a>
				<p class="post-meta text-muted">
					By <span class="post-author">{{$post->user->name}}</span>
					&nbsp;&nbsp;•&nbsp;&nbsp;
					{{date('F d, Y ', strtotime($post->created_at))}}
				</p>
				<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}">
					<img src="upload/{{$post->photo}}">
				</a>
			</div>
			<p class="post-body">
				{{$post->content}}}
			</p>
			<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}" class="btn btn-dark-cyan">Continue Reading</a>
		</article>
	@endforeach

	<!-- Pagination -->
	<nav class="text-center">
		{{$posts->appends(['keyword' => $keyword])->links()}}
	</nav>
</section>
@endsection