@if($ratings->isNotEmpty())
	@foreach($ratings as $rating)
		<div>
			{{ $rating->rating }}
			</div>
	@endforeach
		@if (empty($_GET))
			{{$ratings->links()}}
		@else
			{{$ratings->appends($_GET)->links()}}
		@endif
@else
	<h3>No rating items found</h3>
@endif