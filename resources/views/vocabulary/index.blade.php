@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Search Vocabulary</h1>

    <form method="POST" action="{{ route('vocabulary.search') }}">
        @csrf
        <div class="mb-3">
            <label for="word" class="form-label">Enter word</label>
            <input type="text" name="word" class="form-control" id="word" value="{{ old('word', $word ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="option" class="form-label">Select Language</label>
            <select name="option" class="form-control" id="option" required>
                <option value="English" {{ (old('option', $option ?? '') == 'English') ? 'selected' : '' }}>English</option>
                <option value="Sangtam" {{ (old('option', $option ?? '') == 'Sangtam') ? 'selected' : '' }}>Sangtam</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary" onclick="resetForm()">Reset</button>
    </form>

    @if(isset($translatedWord))
        <div class="card my-4">
            <div class="card-header">
                <h3>Translation Result</h3>
            </div>
            <div class="card-body">
                <p><strong>English Word:</strong> {{ $translatedWord['englishWord'] }}</p>
                <p><strong>Sangtam Word:</strong> {{ $translatedWord['sangtamWord'] }}</p>
                <p><strong>Sangtam Meaning:</strong></p>
                <p style="white-space: pre-wrap; overflow-wrap: break-word;">{{ $translatedWord['sangtamMeaning'] }}</p>
            </div>
        </div>
    @elseif(isset($errorMsg))
        <div class="card my-4">
            <div class="card-header">
                <h3>Error</h3>
            </div>
            <div class="card-body">
                <p>{{ $errorMsg }}</p>
                <p>Please try another word.</p>
            </div>
        </div>
    @endif
</div>

<script>
    function resetForm() {
        document.getElementById('word').value = '';
        document.getElementById('option').value = 'English';
    }
</script>
@endsection
