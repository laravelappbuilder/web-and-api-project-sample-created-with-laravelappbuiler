@if($comments->isNotEmpty())
	@foreach($comments as $comment)
		<div>
			{{ $comment->comment }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$comments->links()}}
		@else
			{{$comments->appends($_GET)->links()}}
		@endif
@else
	<h3>No comment items found</h3>
@endif