@extends('layouts.app')

@section('content')
	@component('components.posts.edit',['post'=>$post])
	@endcomponent
@endsection