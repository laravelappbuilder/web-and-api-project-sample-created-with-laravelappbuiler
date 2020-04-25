@extends('layouts.app')

@section('content')
	@component('components.posts.index',['posts'=>$posts])
	@endcomponent
@endsection