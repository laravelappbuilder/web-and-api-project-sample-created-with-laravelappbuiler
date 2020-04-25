<div class="container">
    <form class="form-horizontal" action="{{route('ratings.store')}}" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
					<label for="post_id">Post</label>
					<select  name="post_id"  class="form-control"  multiple>
				             <option>Update values with api</option>
				        </select>
					@error('post_id')
						<small >{{$message}}</small>
					@enderror
				</div>

				<div class="form-group">
        	<label for="rating">Rating</label>
        	<input type="number" name="rating" value="{{ old('rating')}}" class="form-control">
        	@error('rating')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>