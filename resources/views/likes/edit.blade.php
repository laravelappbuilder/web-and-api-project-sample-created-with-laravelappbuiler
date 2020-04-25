@extends('layouts.app')

@section('content')
	@component('components.likes.edit',['like'=>$like])
	@endcomponent
@endsection