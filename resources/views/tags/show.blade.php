@extends('layouts.app')

@section('content')
	@component('components.tags.show',['tag'=>$tag])
	@endcomponent
@endsection