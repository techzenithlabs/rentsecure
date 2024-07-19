<header class="header">
    <nav>
        <a class="navbar-brand" href="#">
            <img class="" src="{{ asset('public/assets/images/logo.png') }}">
        </a>
        <div class="nav-right">
            <ul>
                <li class="active"><a href="{{ URL('/') }}">Home</a></li>
                <li><a href="{{ URL('page/about-us') }}">About us</a></li>
                <li><a href="{{ URL('page/testimonial') }}">Testimonial</a></li>
                <li><a href="{{ URL('page/blog') }}">Blog</a></li>
                <li><a href="{{ URL('page/contact-us') }}">Contact Us</a></li>
            </ul>
            <div class="sign-up">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </nav>
</header>
