@extends('layouts.app')

@section('content')
	@component('components.ratings.show',['rating'=>$rating])
	@endcomponent
@endsection