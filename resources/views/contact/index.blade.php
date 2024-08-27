@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Yusi tsidsanung likhang</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $contact['publisher'] }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Phone:</strong> {{ $contact['phone'] }}</p>
            @if(!empty($contact['addphone']))
                <p><strong>Additional Phone:</strong> {{ $contact['addphone'] }}</p>
            @endif
            <p><strong>Email:</strong> {{ $contact['email'] }}</p>
            <p><strong>Address:</strong> {{ $contact['address'] }}</p>
        </div>
    </div>
</div>
@endsection
