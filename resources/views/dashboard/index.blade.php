@extends('layout.dashboard')

@section('title', 'Dashboard')

@section('content')
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>Manage your account, submit feedback, and more!</p>
@endsection
