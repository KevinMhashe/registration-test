<form id="registerForm">
    <input type="text" name="name" id="name" required>
    <input type="email" name="email" id="email" required>
    <input type="text" name="phone" id="phone" required>
    <input type="password" name="password" id="password" required>
    <select name="amount" id="amount" required>
        <option value="30000">6 Months - INR 300</option>
        <option value="50000">12 Months - INR 500</option>
    </select>
    <button type="submit">Register</button>
</form>

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

    // Call your backend to create an order for Razorpay
    axios.post('https://apilihpikihna.org/api/create-order', { amount: amount })
        .then(function (response) {
            let order = response.data;

            var options = {
                "key": "rzp_test_kWY517XZvg4gbN",
                "amount": amount, // Amount in paise
                "currency": "INR",
                "name": name,
                "description": "Subscription Plan",
                "order_id": order.id,
                "handler": function (paymentResponse) {
                    // On successful payment
                    formData.append('razorpay_payment_id', paymentResponse.razorpay_payment_id);
                    formData.append('razorpay_order_id', paymentResponse.razorpay_order_id);
                    formData.append('razorpay_signature', paymentResponse.razorpay_signature);

                    // Now submit the form data along with payment details to your backend
                    axios.post('https://apilihpikihna.org/api/register', formData)
                        .then(function (registerResponse) {
                            if (registerResponse.data.token) {
                                // Redirect to the login page or dashboard
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
