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
                        <div class="progress-sec">
                            <ul>
                                <li class="completed">
                                    <label>Step 1/4</label>
                                    <span></span>
                                </li>
                                <li class="completed">
                                    <label>Step 2/4</label>
                                    <span></span>
                                </li>
                                <li>
                                    <label>Step 3/4</label>
                                    <span></span>
                                </li>
                                <li>
                                    <label>Step 4/4</label>
                                    <span></span>
                                </li>
                            </ul>
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
                                <form method="post" action="{!! url('session') !!}" name="formstep2">
                                    @csrf
                                    <input type="hidden" name="productname" value="starter pack">
                                    <input type="hidden" name="price" value="30">
                                <div class="pricing-btn">
                                    <button type="submit">Buy Now</button> <button>View Sample</button>
                                </div>
                                </form>
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
                                <form method="post" action="{!! url('session') !!}" name="formstep2">
                                    @csrf
                                    <input type="hidden" name="productname" value="business pack">
                                    <input type="hidden" name="price" value="100">
                                <div class="pricing-btn">
                                    <button type="submit">Buy Now</button> <button>View Sample</button>
                                </div>
                                </form>
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
                                <form method="post" action="{!! url('session') !!}" name="formstep2">
                                    @csrf
                                    <input type="hidden" name="productname" value="professional pack">
                                    <input type="hidden" name="price" value="150">
                                <div class="pricing-btn">
                                    <button type="submit">Buy Now</button> <button>View Sample</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('landlord/screening/tenant/step1') }}" class="back-btn">Back</a>

                    </div>
                </div>

            </div>


            </section>
        </div>
@include('includes.footer')

