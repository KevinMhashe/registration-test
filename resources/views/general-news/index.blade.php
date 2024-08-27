@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">ALIMIH MÜKANG</h1>

    <div id="general-news-container">
        @include('general-news.partials._news', ['gks' => $gks])
    </div>

    {{-- <button id="load-more" class="btn btn-primary">Load More</button> --}}
</div>

<script>
    let page = {{ $page }};
    const limit = {{ $limit }};
    const apiUrl = '{{ route("general-news.loadMore") }}';

    function toggleContent(id, fullAccess, isAuthenticated) {
    const content = document.getElementById(`content-${id}`);
    const button = document.getElementById(`toggle-button-${id}`);

    // If the content is not fully accessible and the user is not authenticated, redirect to the registration page
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
</script>
@endsection
