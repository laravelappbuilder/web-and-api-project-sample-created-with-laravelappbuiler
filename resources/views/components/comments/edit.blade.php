<div class="container">
    <form class="form-horizontal" action="{{route('comments.update',$comment->id)}}'" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">	<label for="post_id">Post</label>	<select  name="post_id"  class="form-control" 				>             <option>Update values with api</option>        </select>	@error('post_id')		<small >{{$message}}</small>	@enderror</div>

				<div class="form-group">
        	<label for="comment">Comment</label>
        	<input type="textarea" name="comment" value="{{ $comment->comment}}" class="form-control">
        	@error('comment')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>