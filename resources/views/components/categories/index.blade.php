@if($categories->isNotEmpty())
	@foreach($categories as $category)
		<div>
			<h3><a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a></h3>
			</div>
	@endforeach
		@if (empty($_GET))
			{{$categories->links()}}
		@else
			{{$categories->appends($_GET)->links()}}
		@endif
@else
	<h3>No category items found</h3>
@endif