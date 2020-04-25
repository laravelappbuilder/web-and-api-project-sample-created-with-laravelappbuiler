<div>
	{{ $like->like }}
	<br>
	@can ('update',$like)
		<a class="ui mini button" href="{{route('likes.edit',$like->id)}}">edit</a>
		{!! Form::model($like, ['route' => ['likes.update', $like->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>