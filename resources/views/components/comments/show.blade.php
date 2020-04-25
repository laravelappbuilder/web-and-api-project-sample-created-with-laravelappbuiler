<div>
	{{ $comment->comment }}
	<br>
	@can ('update',$comment)
		<a class="ui mini button" href="{{route('comments.edit',$comment->id)}}">edit</a>
		{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>