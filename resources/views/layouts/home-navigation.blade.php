<header class="header">
    <nav>
        <a class="navbar-brand" href="#">
            <img class="" src="{{ asset('public/assets/images/logo.png') }}">
        </a>
        <div class="nav-right">
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="{{ URL('page/about-us') }}">About us</a></li>
                <li><a href="{{ URL('page/services') }}">Services</a></li>
                <li><a href="{{ URL('page/pricing') }}">Pricing</a></li>
                <li style="display:none"><a href="#">Testimonial</a></li>
                <li><a href="{{ URL('page/blog') }}">Blog</a></li>
            </ul>
            <div class="sign-up">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </nav>
</header>
