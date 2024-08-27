@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">{{ $about['title'] }}</h1>

    <div class="card">
        <div class="card-body">
            {!! $about['content'] !!}
        </div>
    </div>
</div>
@endsection
