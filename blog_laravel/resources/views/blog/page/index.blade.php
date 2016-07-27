@extends('blog.layouts.master')

@section('content')
<!-- Posts -->
<section class="col-md-8">
	@foreach($posts as $post)
		<article>
			<div class="post-heading text-center">
				<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}" class="post-title">{{$post->title}}</a>
				<p class="post-meta text-muted">
					By <span class="post-author">{{$post->user->name}}</span>
					&nbsp;&nbsp;•&nbsp;&nbsp;
					{{date('F d, Y ', strtotime($post->created_at))}}
				</p>
				@if (!empty($post->photo))
					<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}">
						<img src="upload/{{$post->photo}}">
					</a>
				@endif
			</div>
			<p class="post-body">
				{!!$post->content!!}
			</p>
			<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}" class="btn btn-dark-cyan">Continue Reading</a>
		</article>
	@endforeach

	<!-- Pagination -->
	<nav class="text-center">
		{{$posts->links()}}
	</nav>
</section>
@endsection