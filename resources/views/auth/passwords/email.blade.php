@extends('layouts.app')

@section('content')

<div class="container">
    <form class="form-horizontal" action="{{ route('password.email') }}" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
	<label for="email">Email Address</label>
	<input type="email" name="email" value="{{ old('email')}}" class="form-control">
	@error('email')
		<small >{{$message}}</small>
	@enderror
</div>
			<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection