@extends('layouts.app')

@section('content')
    <h1>You need an account to provide your feedback.</h1>

    <div>
        <h3><a href="{{ route('register') }}">Register</a></h3>
    </div>

    <h2>Already have an account?</h2>

    <div>
        <h3><a href="{{ route('login') }}">Login</a></h3>
    </div>

@endsection