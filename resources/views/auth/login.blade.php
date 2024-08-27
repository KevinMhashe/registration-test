{{--
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autocomplete="off">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    axios.post(`{{ env('BACKEND_API_URL') }}/login`, {
        email: email,
        password: password
    })
    .then(function (response) {
        if (response.data.token) {
            sessionStorage.setItem('token', response.data.token);
            window.location.href = "/dashboard";
        }
    })
    .catch(function (error) {
        console.error('Login failed:', error.response.data);
        alert('Login failed: ' + error.response.data.message);
    });
});
</script>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autocomplete="off">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    axios.post(`{{ env('BACKEND_API_URL') }}/login`, {
        email: email,
        password: password
    })
    .then(function (response) {
        if (response.data.token) {
            alert('Login successful!');
            sessionStorage.setItem('token', response.data.token);
            window.location.href = "/dashboard";
        }
    })
    .catch(function (error) {
        console.error('Login failed:', error.response.data);
        alert('Login failed: ' + error.response.data.message);
    });
});
</script>
@endsection
