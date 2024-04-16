@extends('layouts.main-layout')

@section('content')

<main>

    <section class="page-logo-container">
        <a href="{{route('home')}}"><img src="{{ asset('images/logo.png') }}" alt="404"></a>
    </section>

    <section id="view-user-edit-link">
        <a class="home-menu-anchor" href="{{ route('edit', ['username' => $user->username]) }}">Edit</a>
    </section>

    <section id="view-user-main-details-container">

        <div id="details-name">
            <h3 style="text-decoration: underline;">Full Name</h3>
            <h3>{{$user->fullname}}</h3>
        </div>

        <div id="details-main-address">
            <h3 style="text-decoration: underline;">Main Address</h3>
            <h3>{{$user->main_address}}</h3>
        </div>

    </section>

    <section id="view-user-other-addresses-container">

        <h3>Other Addresses</h3>

        <table>
            <thead>
                <tr>
                    <th>Other Address</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach($addresses as $address)
                    <tr>
                        <td>{{$address->address}}</td>
                        <td>{{$address->created_at}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

    </section>

</main>

@endsection