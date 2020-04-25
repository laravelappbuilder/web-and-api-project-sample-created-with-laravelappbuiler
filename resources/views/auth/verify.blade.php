@extends('layouts.app')

@section('content')

@if(session('resent')) 
	<h3>A fresh verification link has been sent to your email address.</h3>
@endif


    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

@endsection