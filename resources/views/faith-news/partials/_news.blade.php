@foreach($faiths as $faith)
<div class="card my-4">
    <div class="card-header">
        <h2>{{ $faith['title'] }}</h2>
    </div>
    <div class="card-body">
        <div id="content-{{ $faith['id'] }}"
            data-content="{!! $faith['content'] !!}"
            data-excerpt="{!! $faith['excerpt'] !!}">
            {!! $faith['excerpt'] !!}
        </div>
        <button class="btn btn-link" id="toggle-button-{{ $faith['id'] }}"
            onclick="toggleContent({{ $faith['id'] }}, {{ $faith['full_access'] ? 'true' : 'false' }}, {{ auth()->check() ? 'true' : 'false' }})">
            MÜTOHZAH
        </button>
    </div>
</div>
@endforeach
