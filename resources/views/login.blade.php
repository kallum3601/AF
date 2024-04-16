@extends('layouts.main-layout')

@section('content')

    <section id="login-form-container">

        <form action="{{route('login')}}" method="POST">
            <img src="{{asset('images/logo.png')}}" alt="404">
            @csrf
            <label for="username">Username:</label>
            <input type="text" name="username">
            <label for="password">Password:</label>
            <input type="password" name="password">
            @if($errors->any())
                <p style="color: red;">{{ $errors->first('message')}}</p>
            @endif
            <p>No Account? <a href="register">Register Here</a></p>
            <button class="login-register-btn" type="submit">Submit</button>
        </form>
    </section>

@endsection