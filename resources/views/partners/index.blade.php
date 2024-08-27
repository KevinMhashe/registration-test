@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Partners</h1>

    @foreach($partners as $partner)
    <div class="card my-4">
        <div class="card-header">
            <h2>{{ $partner['name'] }}</h2>
        </div>
        <div class="card-body">
            <p>{{ $partner['villagetownname'] }}</p>
            <p>{{ $partner['designation'] }}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
