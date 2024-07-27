<aside class="sidbar">
    <div class="navigation">
        <ul>
            <li><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('public/assets/images/dashboard.png') }}"> Dashboard</a></li>
            <li>
                <a href="#propertiesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <img class="img-fluid" src="{{ asset('public/assets/images/property.png') }}"> Properties
                </a>
                <ul class="collapse list-unstyled" id="propertiesSubmenu">
                    <li><a href="{{ route('property') }}"><img class="img-fluid" src="{{ asset('public/assets/images/property.png') }}">My Property</a></li>
                    <li><a href="{{ route('property.tenant-applied') }}"><img class="img-fluid" src="{{ asset('public/assets/images/property.png') }}">Tenant Applied</a></li>
                </ul>
            </li>
            <li><a href="{{ route('landlord.screening.tenant') }}/step1"><img class="img-fluid" src="{{ asset('public/assets/images/user.png') }}">Tenant Screening</a></li>
            <li><a href="{{ route('pricing') }}"><img class="img-fluid" src="{{ asset('public/assets/images/price.png') }}"> Pricing</a></li>


        </ul>
    </div>
</aside>
