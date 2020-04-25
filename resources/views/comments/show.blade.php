@extends('layouts.app')

@section('content')
	@component('components.comments.show',['comment'=>$comment])
	@endcomponent
@endsection