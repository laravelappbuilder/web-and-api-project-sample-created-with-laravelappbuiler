@extends('layouts.app')

@section('content')
	@component('components.ratings.index',['ratings'=>$ratings])
	@endcomponent
@endsection