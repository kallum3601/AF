@extends('layouts.main-layout')

@section('content')

    <section class="page-logo-container">
        <a href="{{route('home')}}"><img src="{{ asset('images/logo.png') }}" alt="404"></a>
    </section>

    <main id="home-main">

        <section id="home-menu-container">

            <section id="home-navigation-container">
                <a class="home-menu-anchor" href="{{route('find')}}">Find Users</a>
                <a class="home-menu-anchor" href="{{route('export-users')}}">Export Users</a>
            </section>
        
            <section id="home-analytics-container">
                <div id="analytics-amount-users">
                    <h3>Amount of Users</h3>
                    <h3>{{$userCount}}</h3>
                </div>
        
                <div id="analytics-amount-addresses">
                    <h3>Amount of Addresses</h3>
                    <h3>{{$addressCount}}</h3>
                </div>
            </section>
    
        </section>

    </main>

@endsection