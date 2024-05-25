<header class="dashboard-header">
	<div class="dashboard-navbar">

        <x-nav-link :href="route('dashboard')" class="innerLogo"  :active="request()->routeIs('dashboard')">
            <img class="img-fluid" src="{{asset('public/assets/images/white-logo.png') }}">
        </x-nav-link>

		<div class="navright">
			<div class="notification">
				<ul>
					<li> <i class="bi bi-chat-square-text"></i></li>
					<li><i class="bi bi-bell"></i></li>
				</ul>
			</div>
			<div class="login-sec">
				<button class="btn btn-secondary">
					<img class="images" src="{{asset('public/assets/images/admin-img.png') }}">
					<a class="admin">
                        {{ Auth::user()->firstname }} {{Auth::user()->lastname  }} <label>{{ roleById(Auth::user()->role_id) }}</label>
					</a>
				</button>
		  </div>
             <!-- Settings Dropdown -->
             <div class="shadow-lg rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                <ul>
                    <li><a href="{{ route('profile.edit')}}">{{ __('Profile') }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="{{ route('logout') }}" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>

            </div>
		</div>
	</nav>
</header>
