@extends('layouts.app')

@section('content')
	@component('components.categories.show',['category'=>$category])
	@endcomponent
@endsection