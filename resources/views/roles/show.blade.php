@extends('layouts.app')

@section('content')
	@component('components.roles.show',['role'=>$role])
	@endcomponent
@endsection