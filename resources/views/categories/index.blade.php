@extends('layouts.app')

@section('content')
	@component('components.categories.index',['categories'=>$categories])
	@endcomponent
@endsection