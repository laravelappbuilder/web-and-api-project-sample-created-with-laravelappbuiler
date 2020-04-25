@extends('layouts.app')

@section('content')
	@component('components.roles.edit',['role'=>$role])
	@endcomponent
@endsection