<div class="container">
    <form class="form-horizontal" action="{{route('ratings.update',$rating->id)}}'" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">

				<div class="form-group">
        	<label for="rating">Rating</label>
        	<input type="number" name="rating" value="{{ $rating->rating}}" class="form-control">
        	@error('rating')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>