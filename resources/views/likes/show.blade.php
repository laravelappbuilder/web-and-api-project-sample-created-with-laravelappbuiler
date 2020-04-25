@extends('layouts.app')

@section('content')
	@component('components.likes.show',['like'=>$like])
	@endcomponent
@endsection