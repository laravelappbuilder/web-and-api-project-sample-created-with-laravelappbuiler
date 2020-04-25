<div class="container">
    <form class="form-horizontal" action="{{route('likes.update',$like->id)}}'" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">	<label for="post_id">Post</label>	<select  name="post_id"  class="form-control" 				>             <option>Update values with api</option>        </select>	@error('post_id')		<small >{{$message}}</small>	@enderror</div>

				<div class="form-group">
        	<label for="like">Like</label>
        	<input type="number" name="like" value="{{ $like->like}}" class="form-control">
        	@error('like')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>