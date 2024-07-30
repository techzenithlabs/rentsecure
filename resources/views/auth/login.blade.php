<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RentSecure.ca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }

        .login-container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form {
            flex: 1;
            padding: 40px;
            max-width: 50%;
        }
       
        .login-image {
            flex: 1;
            background: url('../rent/public/assets/images/login-banner.png') no-repeat center center;
            background-size: cover;
            display: block;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #6f2c9b;
            color: white;
            border-radius: 25px;
            padding: 12px 36px;
            font-size: 18px;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #5b237d;
            color: white;
        }

        .btn-social {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 5px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 18px;
        }

        .form-control {
            border-radius: 25px;
        }

        .form-group .form-control::placeholder {
            font-size: 14px;
        }

        .text-link {
            color: #5b237d;
        }

        .text-link:hover {
            color: #343a40;
        }
        h2.text-left {
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="login-container">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Verification Status -->
    @if (session('verification_status'))
        <div class="mb-4 text-green-600">
            {{ session('verification_status') }}
        </div>
    @endif

    @if (session('info'))
        <div style="margin-bottom:10px" class="alert alert-info">
          <a style="color:rgb(207, 71, 71)">  {{ session('info') }}</a>
        </div>
    @endif
        <div class="login-form">
            <div class="logo">
                <img src="{{ asset('public/assets/images/login-logo.png') }}" alt="RentSecure.ca Logo">
            </div>
            <h2 class="text-left">Login</h2>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <label for="email">Username/Email Address</label>
                    
                <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />


                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    
                    <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required
                autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="d-flex justify-content-between align-items-right">
                   
                <a style="visibility:hidden;" class="text-link" href="#">Forgot Password?</a>
                @if (Route::has('password.request'))
                    <a class="text-link" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif    
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-custom">Login</button>
                </div>
                <div class="text-center mt-4">
                    <p>Don't Have An Account? <a class="text-link" href="{{ route('register') }}">Sign Up</a></p>
                </div>
                <div style="display:none;" class="text-center mt-4">
                    <p>Or</p>
                    <a href="#" class="btn btn-light btn-social"><i class="fab fa-google"></i></a>
                    <a href="#" class="btn btn-light btn-social"><i class="fab fa-apple"></i></a>
                    <a href="#" class="btn btn-light btn-social"><i class="fab fa-facebook-f"></i></a>
                </div>
            </form>
        </div>
        <div class="login-image"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
