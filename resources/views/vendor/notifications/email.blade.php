<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        /* Add any custom styles here */
    </style>
</head>
<body>
    <h1> Hello, {{ $userName }}</h1>

    @foreach ($introLines as $line)
        <p>{{ $line }}</p>
    @endforeach

    <a href="{{ $actionUrl }}" style="display: inline-block; padding: 10px 20px; color: white; background-color: blue; text-decoration: none;">{{ $actionText }}</a>

    @foreach ($outroLines as $line)
        <p>{{ $line }}</p>
    @endforeach

    <p>{{ $salutation }}</p>

    <p>Regards,<br>{{ config('app.name') }}</p>

    <p>If you're having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below into your web browser: <a href="{{ $actionUrl }}">{{ $displayableActionUrl }}</a></p>
</body>
</html>
