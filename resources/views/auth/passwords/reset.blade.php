@extends('layouts.app')

@section('content')

<div class="container">
    <form class="form-horizontal" action="{{ route('password.update') }}" method="POST" >
        <input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
	<label for="email">Email Address</label>
	<input type="email" name="email" value="{{ old('email')}}" class="form-control">
	@error('email')
		<small >{{$message}}</small>
	@enderror
</div>
			<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" value="{{ old('password')}}" class="form-control">
	@error('password')
		<small >{{$message}}</small>
	@enderror
</div>
			<div class="form-group">
	<label for="password_confirmation">Confirm Password</label>
	<input type="password" name="password_confirmation" value="" class="form-control">
	@error('password_confirmation')
		<small >{{$message}}</small>
	@enderror
</div>
			<button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection