@extends('layouts.app')

@section('content')
	@component('components.likes.index',['likes'=>$likes])
	@endcomponent
@endsection