<!DOCTYPE html>
<html>
<head>
    <title>Checkout Cancel</title>
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
<body>
    <div class="message">
        <p>Payment Cancelled. You will be redirected shortly...</p>
    </div>

    <script>
        // Redirect after 15 seconds (15000 milliseconds)
        setTimeout(function() {
            window.location.href = "{{ url('landlord/screening/tenant/step2') }}";
        }, 15000);
    </script>
</body>
</html>
