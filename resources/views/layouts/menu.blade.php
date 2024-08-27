<div class="menu-container">
    <div class="row" style="float:right; margin-right:5rem; nav-menu">
        <div class="col-md-12">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('partners')}}">Partners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ route('vocabulary.index')}}">Yutsetase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="{{ url('subscription')}}">Subscription Plans</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="https://lihpikihna.org/" target="_blank">Our Website</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{{--
<style>
    .nav-logo {
        width: 150px;
        /* Adjust the width to your preference */
        height: auto;
        /* Maintain aspect ratio */
        max-width: 100%;
        /* Make the logo responsive */
    }

    @media (max-width: 768px) {
        .nav-logo {
            width: 100px;
            /* Smaller width for mobile devices */
        }
    }
</style> --}}
<style>
    @media (max-width: 768px) {
        .menu-container {
            display: none;
        }
    }

    /* .sm\:hidden {
        display: block;
    } */
</style>
