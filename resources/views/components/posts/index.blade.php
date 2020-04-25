@if($posts->isNotEmpty())
	@foreach($posts as $post)
		<div>
			<img src="{{asset('images/'.$post->coverimage)}}" alt="Image Loading"/>
			<h3><a href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a></h3>
			{{ $post->body }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$posts->links()}}
		@else
			{{$posts->appends($_GET)->links()}}
		@endif
@else
	<h3>No post items found</h3>
@endif