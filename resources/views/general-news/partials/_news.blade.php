@foreach($gks as $gk)
<div class="card my-4">
    <div class="card-header">
        <h2>{{ $gk['title'] }}</h2>
    </div>
    <div class="card-body">
        <div id="content-{{ $gk['id'] }}"
            data-content="{!! $gk['content'] !!}"
            data-excerpt="{!! $gk['excerpt'] !!}">
            {!! $gk['excerpt'] !!}
        </div>
        <button class="btn btn-link" id="toggle-button-{{ $gk['id'] }}"
            onclick="toggleContent({{ $gk['id'] }}, {{ $gk['full_access'] ? 'true' : 'false' }}, {{ auth()->check() ? 'true' : 'false' }})">
            MÜTOHZAH
        </button>
    </div>
</div>
@endforeach
