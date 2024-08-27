
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form id="registerForm" autocomplete="off">
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required autocomplete="off">
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required autocomplete="off">
                        </div>
                        <div class="form-group mb-4">
                            <label for="amount">Subscription Plan</label>
                            <div class="input-group">
                                <select class="form-control" id="amount" name="amount" required autocomplete="off">
                                    <option value="" disabled selected>Select Subscription Plan</option>
                                    <option value="30000">6 Months - INR 300</option>
                                    <option value="50000">12 Months - INR 500</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Axios and Razorpay Script -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    let amount = formData.get('amount');
    let name = formData.get('name');
    let email = formData.get('email');
    let phone = formData.get('phone');

    axios.post('https://apilihpikihna.org/api/create-order', { amount: amount })
        .then(function (response) {
            let order = response.data;

            var options = {
                "key": "rzp_test_kWY517XZvg4gbN",
                "amount": amount,
                "currency": "INR",
                "name": name,
                "description": "Subscription Plan",
                "order_id": order.id,
                "handler": function (paymentResponse) {
                    formData.append('razorpay_payment_id', paymentResponse.razorpay_payment_id);
                    formData.append('razorpay_order_id', paymentResponse.razorpay_order_id);
                    formData.append('razorpay_signature', paymentResponse.razorpay_signature);

                    axios.post('https://apilihpikihna.org/api/register', formData)
                        .then(function (registerResponse) {
                            if (registerResponse.data.token) {
                                window.location.href = "/dashboard";
                            }
                        })
                        .catch(function (error) {
                            console.error('Registration failed:', error.response.data);
                        });
                },
                "prefill": {
                    "name": name,
                    "email": email,
                    "contact": phone
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        })
        .catch(function (error) {
            console.error('Order creation failed:', error.response.data);
        });
});
</script>
@endsection
