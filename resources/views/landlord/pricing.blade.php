@include('includes.header')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <section class="main-wrapper">

                @switch(Auth::user()->role_id)
                @case(1){{-- SuperAdmin --}}
                @include('layouts.admin.sidebar')
                  @break
                @case(2){{-- Landlord --}}
                @include('layouts.landlord.sidebar')
                  @break
                @case(3){{-- Tenant --}}
                @include('layouts.tenant.sidebar')
                  @break
               @endswitch

               <div class="main-content">
                <div class="cont-wrapper">
                    <div class="pricing-sec">
                        <div class="card-head">
                            <h3>Pricing</h3>
                        </div>
                        <div class="buynow-offer">
                            <div class="offer-list">
                                <div class="offer-head">
                                    <h3>Features</h3>
                                    <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                                </div>
                                <ul>
                                    <li>Aliquam tincidunt mauris eu.</li>
                                    <li>Vestibulum auctor dapibus.</li>
                                    <li>Nunc dignissim risus id metus.</li>
                                    <li>Cras ornare tristique elit.</li>
                                    <li>Praesent placerat risus quis</li>
                                    <li>Vestibulum auctor dapibus.</li>
                                    <li>Nunc dignissim risus id metus.</li>
                                    <li>Cras ornare tristique elit.</li>
                                    <li>Praesent placerat risus quis</li>
                                </ul>
                            </div>
                            <div class="offer-list">
                                <div class="offer-head">
                                    <h3>Other</h3>
                                    <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                                </div>
                                <ul>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#">Buy Now</a> <button>View Sample</button>
                                </div>
                            </div>
                            <div class="offer-list">
                                <div class="offer-head">
                                    <h3>P1</h3>
                                    <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                                </div>
                                <ul>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#">Buy Now</a> <button>View Sample</button>
                                </div>
                            </div>
                            <div class="offer-list">
                                <div class="offer-head">
                                    <h3>P2</h3>
                                    <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                                </div>
                                <ul>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                    <li><i class="bi bi-three-dots"></i></li>
                                    <li><i class="bi bi-check-lg"></i></li>
                                </ul>
                                <div class="pricing-btn">
                                    <a href="#">Buy Now</a> <button>View Sample</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </section>
        </div>
@include('includes.footer')

