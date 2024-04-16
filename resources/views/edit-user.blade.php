@extends('layouts.main-layout')

@section('content')

<section class="page-info">
    <p>You are currently working with {{$user->fullname}}</p>
</section>

<main>

    <section class="page-logo-container">
        <a href="{{route('home')}}"><img src="{{ asset('images/logo.png') }}" alt="404"></a>
    </section>

    <section id="edit-user-main-address">
        <h3>Main Address</h3>
        <h3 class="address-highlight">{{$user->main_address}}</h3>
    </section>

    <section id="edit-user-other-addresses">
        <h3>Other Addresses</h3>
        <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Created</th>
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

    <section id="edit-user-add-addresses-container">
        <h3>Add Additional Adresses</h3>
        <form action="{{ route('saveAddresses', ['username' => $user->username]) }}" method="POST" method="POST">
            @csrf
            <label for="add-address-1">Add Address:</label>
            <input type="text" name="addresses[]" required>
            <div id="add-extra-address-container">
            </div>
            <button class="default-btn" id="add-extra-address-btn">Add Another Address</button><br>
            <button class="default-btn" type="submit">Submit</button>
        </form>
    </section>

</main>

@endsection