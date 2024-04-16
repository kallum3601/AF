@extends('layouts.main-layout')

@section('content')

<main>

    <section class="page-logo-container">
        <a href="{{route('home')}}"><img src="{{ asset('images/logo.png') }}" alt="404"></a>
    </section>

    <section id="find-users-search-container">
        <form id="search-users-search-form" action="" method="GET">
            @csrf
            <input id="find-users-search-bar" type="search" name="input" placeholder="Search by name..." autofocus>
            <button style="display: none;" type="submit">Submit</button>
        </form>
    </section>

    <section id="find-users-table-container">

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Main Address</th>
                    <th>Date Created</th>
                    <th>View</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->fullname}}</td>
                        <td>{{$user->main_address}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><a href="view/{{$user->username}}">View</a></td>
                        <td><a href="edit/{{$user->username}}">Edit</a></td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    </section>

    <div class="pagination-links">
        {{ $users->links() }}
    </div>

</main>

@endsection