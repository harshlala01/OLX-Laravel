@extends('layouts.app')

@section('content')

<div class="auth-container">
    <h2>Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <div class="auth-link">
        <a href="{{ route('register') }}">Create new account</a>
    </div>
</div>

@endsection