@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">YUDSI RIWÜ</h1>

    <div id="faith-news-container">
        @include('faith-news.partials._news', ['faiths' => $faiths])
    </div>

    {{-- <button id="load-more" class="btn btn-primary">Load More</button> --}}
</div>

<script>
    let page = {{ $page }};
    const limit = {{ $limit }};
    const apiUrl = '{{ route("faith-news.loadMore") }}';

    document.getElementById('load-more').addEventListener('click', function () {
        page++;
        fetch(`${apiUrl}?page=${page}&limit=${limit}`)
            .then(response => response.text())
            .then(html => {
                const container = document.getElementById('faith-news-container');
                container.insertAdjacentHTML('beforeend', html);
            })
            .catch(error => console.log('Error:', error));
    });

    function toggleContent(id, fullAccess, isAuthenticated) {
    const content = document.getElementById(`content-${id}`);
    const button = document.getElementById(`toggle-button-${id}`);

    if (!fullAccess && !isAuthenticated) {
        window.location.href = '{{ url("register") }}';
        return;
    }

    // Toggle between showing full content and excerpt
    if (content.getAttribute('data-full-content') === 'true') {
        content.innerHTML = content.getAttribute('data-excerpt');
        content.setAttribute('data-full-content', 'false');
        button.textContent = 'MÜTOHZAH';
    } else {
        content.innerHTML = content.getAttribute('data-content');
        content.setAttribute('data-full-content', 'true');
        button.textContent = 'Show Less';
    }
}

// No need to initialize the data attributes in JavaScript, since they're already set in the Blade template.

</script>
@endsection
