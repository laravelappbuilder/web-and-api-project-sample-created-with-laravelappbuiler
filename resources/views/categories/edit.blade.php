@extends('layouts.app')

@section('content')
	@component('components.categories.edit',['category'=>$category])
	@endcomponent
@endsection