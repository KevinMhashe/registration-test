@foreach($communitys as $community)
<div class="card my-4">
    <div class="card-header">
        <h2>{{ $community['title'] }}</h2>
    </div>
    <div class="card-body">
        <div id="content-{{ $community['id'] }}"
            data-content="{!! $community['content'] !!}"
            data-excerpt="{!! $community['excerpt'] !!}">
            {!! $community['excerpt'] !!}
        </div>
        <button class="btn btn-link" id="toggle-button-{{ $community['id'] }}"
            onclick="toggleContent({{ $community['id'] }}, {{ $community['full_access'] ? 'true' : 'false' }}, {{ auth()->check() ? 'true' : 'false' }})">
            MÜTOHZAH
        </button>
    </div>
</div>
@endforeach
