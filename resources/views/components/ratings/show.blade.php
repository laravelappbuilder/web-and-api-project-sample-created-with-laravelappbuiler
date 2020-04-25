<div>
	{{ $rating->rating }}
	<br>
	@can ('update',$rating)
		<a class="ui mini button" href="{{route('ratings.edit',$rating->id)}}">edit</a>
		{!! Form::model($rating, ['route' => ['ratings.update', $rating->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>