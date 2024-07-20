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
               <!-----incude main layout-->
               <div class="main-content">
                <div class="cont-wrapper">
                <form method="post" action="{{ url('tenant/screening/step2') }}" name="tenantformstep1">
                        @csrf
                    <div class="tenant-screening">
                        <div class="card-head">
                            <h3>Tenant Screening</h3>
                            <div class="progress-sec">
                                <ul>
                                    <li class="completed">
                                        <label>Step 1/3</label>
                                        <span></span>
                                    </li>
                                    <li>
                                        <label>Step 2/3</label>
                                        <span></span>
                                    </li>
                                    <li>
                                        <label>Step 3/3</label>
                                        <span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-content">
                        <div class="card-body whopays-sec min-hieght">
                            <h2>Hi {{ Auth::user()->firstname }}, <span></span></h2>
                            <p>landlord invited them to fill out a secure online credit report application to rent at the below property 123 Main Street, Toronto ON M4L 1V2. If you have questions, contact info@rentsecure.com</p><br/>
                            <button type="submit" class="next-btn">Get Started</button>
                       </div>
                      </div>

                    </div>
                </form>
                </div>
            </div>
              </section>
        </div>
@include('includes.footer')
