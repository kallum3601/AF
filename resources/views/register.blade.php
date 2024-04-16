@extends('layouts.main-layout')

@section('content')

    <section class="page-logo-container"></section>

    <section id="register-form-container">

        <form action="{{ route('register') }}" method="POST">
            <img src="{{asset('images/logo.png')}}" alt="404">
            @csrf
            <label for="desusername">Desired Username:</label>
            <input type="text" name="desusername">
        
            <label for="despassword">Desired Password:</label>
            <input type="password" name="despassword">
        
            <label for="reppassword">Repeat Password:</label>
            <input type="password" name="reppassword">
        
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname">
        
            <label for="mainaddress">Main Address:</label>
            <input type="text" name="mainaddress">

            @if($errors->any())
                <p style="color: red;">{{ $errors->first('desusername') }}</p>
            @endif

            <p>Already registered? <a href="/">Login Here</a></p>
        
            <button class="login-register-btn" type="submit">Submit</button>
        </form>
        
    </section>

@endsection