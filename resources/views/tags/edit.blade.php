@extends('layouts.app')

@section('content')
	@component('components.tags.edit',['tag'=>$tag])
	@endcomponent
@endsection