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
             <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
		</div>
	</nav>
</header>
