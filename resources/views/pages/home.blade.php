@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="hero-background"></div>
    <div class="yutsetase-content">
        <a href="{{ auth()->check() ? route('vocabulary.index') : url('register') }}">
            <button class="custom-button fw-bolder">YUTSETASE</button>
        </a>
    </div>
</div>

<div class="container text-center fs-4 fw-bold bg-success mt-3 mb-3 py-2">
    <h4>YUSI CHUNG</h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 col-6 image-container">
            <img src="{{ asset('images/faith-news.jpg')}}" alt="faith news" class="img-fixed">
            <a href="{{ route('faith-news')}}" class="btn-overlay">Faith News</a>
        </div>
        <div class="col-md-3 col-6 image-container">
            <img src="{{ asset('images/general-news.jpg')}}" alt="general news" class="img-fixed">
            <a href="{{ route('general-news')}}" class="btn-overlay">General News</a>
        </div>
        <div class="col-md-3 col-6 image-container">
            <img src="{{ asset('images/community-news.jpg')}}" alt="Community news" class="img-fixed">
            <a href="{{ route('community-news')}}" class="btn-overlay">Community News</a>
        </div>
        <div class="col-md-3 col-6 image-container">
            <img src="{{ asset('images/writers-page.jpg')}}" alt="Writers page" class="img-fixed">
            <a href="{{ route('writers')}}" class="btn-overlay">Writers Page</a>
        </div>
    </div>
</div>

<style>
    .hero-section {
        position: relative;
        height: 40vh;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('{{ asset('images/yutsetase.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .yutsetase-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        z-index: 1;
        position: relative;
    }

    .custom-button {
        font-size: 20px; /* Adjusted font size */
        padding: 12px 25px; /* Adjusted padding */
        background-color: transparent;
        border: 2px solid black;
        color: black;
        border-radius: 30px;
        transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #d6a300;
        border-color: rgb(157, 144, 144);
        color: white;
    }

    .image-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
    }

    .img-fixed {
        width: 100%;
        height: 150px; /* Adjusted height */
        object-fit: cover;
    }

    .btn-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px 20px;
        border: none;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-overlay:hover {
        background-color: rgba(0, 0, 0, 0.9);
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 25vh; /* Shorter height for mobile */
        }

        .custom-button {
            font-size: 16px; /* Smaller font size for mobile */
            padding: 8px 18px; /* Smaller padding for mobile */
        }

        .img-fixed {
            height: 120px; /* Adjusted height for mobile */
        }

        .btn-overlay {
            font-size: 14px;
            padding: 8px 16px;
        }
    }
</style>
@endsection
