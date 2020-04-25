<div>
	<h3><a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a></h3>
	<br>
	@can ('update',$category)
		<a class="ui mini button" href="{{route('categories.edit',$category->id)}}">edit</a>
		{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'DELETE']) !!}
			{!! Form::submit("Delete", ['class' => 'ui negative']) !!}
		{!! Form::close() !!}
	@endcan
</div>