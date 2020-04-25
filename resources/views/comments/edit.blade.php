@extends('layouts.app')

@section('content')
	@component('components.comments.edit',['comment'=>$comment])
	@endcomponent
@endsection