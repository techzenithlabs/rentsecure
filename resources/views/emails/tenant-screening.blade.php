<!DOCTYPE html>
<html>
<head>
    <title>Tenant Screening Email</title>
</head>
<body>
    <h2>Tenant Screening Information</h2>
    <p>Dear {{ $tenantscreening->tenant_first_name }},</p>

    <p>We have successfully received your screening information.</p>
    <p>Kindly Register <a href="https://testxone.com/rent/register?email={{$tenantscreening->tenant_email}}">Here</a></p>

    <p>Thank you,</p>
    <p>Rent Secure</p>
</body>
</html>
