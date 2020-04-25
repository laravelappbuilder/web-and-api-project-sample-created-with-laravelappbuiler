@extends('layouts.app')

@section('content')
	@component('components.posts.show',['post'=>$post])
	@endcomponent
@endsection