@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to the Dashboard</h1>
    <p>This is the main dashboard page.</p>

    @include('partials.alerts', ['message' => 'You are logged in!'])

    <div class="dashboard-content">
        <h2>Your Recent Activities</h2>
    </div>
@endsection
