@extends('layouts.app')

@section('content')
	@component('components.tags.index',['tags'=>$tags])
	@endcomponent
@endsection