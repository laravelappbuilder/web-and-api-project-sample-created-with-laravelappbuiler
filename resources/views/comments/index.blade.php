@extends('layouts.app')

@section('content')
	@component('components.comments.index',['comments'=>$comments])
	@endcomponent
@endsection