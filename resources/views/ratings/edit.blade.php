@extends('layouts.app')

@section('content')
	@component('components.ratings.edit',['rating'=>$rating])
	@endcomponent
@endsection