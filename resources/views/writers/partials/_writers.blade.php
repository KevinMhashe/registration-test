@foreach($writers as $writer)
<div class="card my-4">
    <div class="card-header">
        <h2>{{ $writer['title'] }}</h2>
    </div>
    <div class="card-body">
        <div id="content-{{ $writer['id'] }}"
            data-content="{!! $writer['content'] !!}"
            data-excerpt="{!! $writer['excerpt'] !!}">
            {!! $writer['excerpt'] !!}
        </div>
        <button class="btn btn-link" id="toggle-button-{{ $writer['id'] }}"
            onclick="toggleContent({{ $writer['id'] }}, {{ $writer['full_access'] ? 'true' : 'false' }}, {{ auth()->check() ? 'true' : 'false' }})">
            MÜTOHZAH
        </button>
    </div>
</div>
@endforeach
