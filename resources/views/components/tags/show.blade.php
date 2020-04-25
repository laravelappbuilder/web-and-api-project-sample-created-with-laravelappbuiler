<div>
	<h3><a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a></h3>
	<br>
	@can ('update',$tag)
		<a class="ui mini button" href="{{route('tags.edit',$tag->id)}}">edit</a>
		{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>