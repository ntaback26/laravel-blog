<!-- Sidebar -->
<aside class="col-md-4">
	<div id="search" class="widget">
		<form class="form-horizontal" action="{{route('blog.page.search')}}">
			<div class="form-group">
				<div class="col-xs-10">
		    	<input type="text" class="form-control" name="keyword" placeholder="Enter keyword ...">
	    	</div>
		    <div class="col-xs-2">
		      <button type="submit" class="btn btn-dark-cyan pull-right">
						<i class="fa fa-search"></i>
					</button>
		    </div>
		  </div>
	  </form>
	</div>		

	<div id="recent-posts" class="widget">
		<div class="panel panel-default">
		  <div class="panel-heading line">
		  	<h3>Recent Posts</h3>
		  </div>
		  <div class="panel-body">
		  	@foreach($recentPosts as $post)
			  	<div class="entry">
			  		<a href="{{route('blog.page.post', ['slug' => $post->slug, 'id' => $post->id])}}">
			  			{{$post->title}}
			  		</a><br>
			  		<i class="text-muted">{{date('F d, Y ', strtotime($post->created_at))}}</i>
			  	</div>
		  	@endforeach
		  </div>
		</div>
	</div>

	<div id="recent-comments" class="widget">
		<div class="panel panel-default">
		  <div class="panel-heading line">
		  	<h3>Recent Comments</h3>
		  </div>
		  <div class="panel-body">
		  	@foreach($recentComments as $comment)
			  	<div class="entry">
			  		<span class="text-muted">{{$comment->user->name}}</span> on 
			  		<a href="{{route('blog.page.post', ['slug' => $comment->post->slug, 'id' => $comment->post->id])}}">{{$comment->post->title}}</a>
			  	</div>
		  	@endforeach
		  </div>
		</div>
	</div>
</aside>