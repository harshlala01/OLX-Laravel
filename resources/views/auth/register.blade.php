@extends('layouts.app')

@section('content')

<div class="auth-container">
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

        <button type="submit">Register</button>
    </form>

    <div class="auth-link">
        <a href="{{ route('login') }}">Already have account? Login</a>
    </div>
</div>

@endsection