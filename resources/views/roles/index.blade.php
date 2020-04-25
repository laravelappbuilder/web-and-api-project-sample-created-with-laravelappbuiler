@extends('layouts.app')

@section('content')
	@component('components.roles.index',['roles'=>$roles])
	@endcomponent
@endsection