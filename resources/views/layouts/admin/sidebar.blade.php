<aside class="sidbar">
    <div class="navigation">
        <ul>
            <li><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('public/assets/images/dashboard.png') }}"> Dashboard</a></li>
            <li>
                <a href="#propertiesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img class="img-fluid" src="{{ asset('public/assets/images/property.png') }}"> Properties
                </a>
                <ul class="collapse list-unstyled" id="propertiesSubmenu">
                    <li><a href="{{ route('property.landlord') }}">Landlord Property</a></li>
                    <li><a href="#">Tenants</a></li>

                </ul>
            </li>
            <li>
                <a href="#screeningSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img class="img-fluid" src="{{ asset('public/assets/images/user.png') }}"> Screening
                </a>
                <ul class="collapse list-unstyled" id="screeningSubmenu">
                    <li><a href="#">Landlord</a></li>
                    <li><a href="#">Tenant</a></li>

                </ul>
            </li>

        </ul>
    </div>
</aside>
