<div class="container">
    <form class="form-horizontal" action="{{route('tags.store')}}" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
        	<label for="name">Name</label>
        	<input type="text" name="name" value="{{ old('name')}}" class="form-control">
        	@error('name')
        		<small >{{$message}}</small>
        	@enderror
        </div>

				<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>