<div>
	<img src="{{asset('images/'.$post->coverimage)}}" alt="Image Loading"/>
	<h3><a href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a></h3>
	{{ $post->body }}
	<br>
	@can ('update',$post)
		<a class="ui mini button" href="{{route('posts.edit',$post->slug)}}">edit</a>
		{!! Form::model($post, ['route' => ['posts.update', $post->slug], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>