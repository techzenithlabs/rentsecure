<header class="header">
    <nav>
        <a class="navbar-brand" href="#">
            <img class="" src="{{ asset('public/assets/images/logo.png') }}">
        </a>
        <div class="nav-right">
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Testimonial</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
            <div class="sign-up">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </nav>
</header>
