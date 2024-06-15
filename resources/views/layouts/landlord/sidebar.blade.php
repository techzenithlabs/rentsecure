<aside class="sidbar">
    <div class="navigation">
        <ul>
            <li><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('public/assets/images/dashboard.png') }}"> Dashboard</a></li>
            <li><a href="{{ route('property') }}"><img class="img-fluid" src="{{ asset('public/assets/images/property.png') }}"> My properties</a></li>
            <li>
                @if( document_verified()==0)
                <a role="button" style="color:#fafafa78" title="Sorry Document is Under Review"><img class="img-fluid" src="{{ asset('public/assets/images/user.png') }}">Tenant Screening</a>
                @else
                <a href="{{ route('landlord.screening.tenant') }}/step1"><img class="img-fluid" src="{{ asset('public/assets/images/user.png') }}">Tenant Screening</a>
                @endif

            </li>
            <li><a href="{{ route('pricing') }}"><img class="img-fluid" src="{{ asset('public/assets/images/price.png') }}"> Pricing</a></li>
        </ul>
    </div>
</aside>
