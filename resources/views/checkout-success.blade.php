<!DOCTYPE html>
<html>
<head>
    <title>Checkout Success</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message {
            font-size: 1.5em;
            text-align: center;
        }
    </style>
</head>
@php
$whopaid = json_encode(Session::get('paymentinfo'));
@endphp
<body>
    <div class="message">
        <p>Payment Successful! You will be redirected shortly...</p>
    </div>

    <script>
        let personpaid = @json(Session::get('paymentinfo'));
        let redirectUrl = "{{ url('landlord/screening/tenant/step3') }}"; // Defa
        // Redirect after 15 seconds (15000 milliseconds)
         // Check the role
         if (personpaid === 'tenant') {
            redirectUrl = "{{ url('landlord/screening/tenant/step4') }}"; // Redirect URL for tenant
        }

        // Redirect after 15 seconds (15000 milliseconds)
        setTimeout(function() {
            window.location.href = redirectUrl;
        }, 5000); // 15000 milliseconds = 15 seconds

   
    </script>
</body>
</html>
