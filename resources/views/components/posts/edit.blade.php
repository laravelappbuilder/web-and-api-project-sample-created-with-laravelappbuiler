<div class="container">
    <form class="form-horizontal" action="{{route('posts.update',$post->slug)}}'" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="_method" value="PUT" />

				<div class="form-group">

				<div class="form-group">
        	<label for="coverimage">Coverimage</label>
        	<input type="image" name="coverimage" value="{{ $post->coverimage}}" class="form-control">
        	@error('coverimage')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" name="title" value="{{ $post->title}}" class="form-control">
        	@error('title')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="body">Body</label>
        	<input type="textarea" name="body" value="{{ $post->body}}" class="form-control">
        	@error('body')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>