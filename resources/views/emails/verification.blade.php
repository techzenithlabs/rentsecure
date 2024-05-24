<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <h2>Hello {{ $user->firstname }},</h2>
    <p>Please click the link below to verify your email address:</p>
    <a href="{{ route('verification.verify', ['token' => $user->verification_token]) }}">Verify Email</a>
    <p>Regards,</p>
    <p>Rent Secure Pvt Ltd</p>
</body>
</html>
