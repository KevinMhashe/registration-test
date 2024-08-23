<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <form id="loginForm">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
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
@endsection
