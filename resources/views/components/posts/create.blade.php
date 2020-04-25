<div class="container">
    <form class="form-horizontal" action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
					<label for="category_id">Category</label>
					<select  name="category_id"  class="form-control"  multiple>
				             <option>Update values with api</option>
				        </select>
					@error('category_id')
						<small >{{$message}}</small>
					@enderror
				</div>

				<div class="form-group">
        	<label for="coverimage">Coverimage</label>
        	<input type="image" name="coverimage" value="{{ old('coverimage')}}" class="form-control">
        	@error('coverimage')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" name="title" value="{{ old('title')}}" class="form-control">
        	@error('title')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
        	<label for="body">Body</label>
        	<input type="textarea" name="body" value="{{ old('body')}}" class="form-control">
        	@error('body')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<div class="form-group">
					<label for="tag_id">Tag</label>
					<select  name="tag_id"  class="form-control"  multiple>
				             <option>Update values with api</option>
				        </select>
					@error('tag_id')
						<small >{{$message}}</small>
					@enderror
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>