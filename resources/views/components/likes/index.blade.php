@if($likes->isNotEmpty())
	@foreach($likes as $like)
		<div>
			{{ $like->like }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$likes->links()}}
		@else
			{{$likes->appends($_GET)->links()}}
		@endif
@else
	<h3>No like items found</h3>
@endif