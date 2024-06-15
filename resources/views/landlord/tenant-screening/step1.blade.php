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
                <form method="post" action="{{ url('landlord/screening/tenant/step2') }}" name="formstep1">
                        @csrf
                    <div class="tenant-screening">
                        <div class="card-head">
                            <h3>Tenant Screening</h3>
                            <div class="progress-sec">
                                <ul>
                                    <li class="completed">
                                        <label>Step 1/4</label>
                                        <span></span>
                                    </li>
                                    <li>
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
                        </div>
                        <div class="form-content">
                        <div class="card-body whopays-sec min-hieght">
                            <h2>Select Who Pays <span>Select who will be entering the applicant’s information and paying</span></h2>
                           
                            <div class="payInfo-sec">
                                <input type="hidden" id="paymentinfo" name="paymentinfo" value="{{ !empty($paymentinfo)?$paymentinfo:"" }}">
                                <ul>
                                    <li  role="button" {!! !empty($paymentinfo) && $paymentinfo == 'landlord' ? 'style="border:1px solid grey;"' : '' !!} data-info="landlord">
                                        <h3>You fill out information and pay</h3>
                                        <span>Enter the applicant’s information and get a report back within 5 minutes.</span>
                                    </li>
                                    <li role="button" {!! !empty($paymentinfo) && $paymentinfo == 'tenant' ? 'style="border:1px solid grey;"' : '' !!} data-info="tenant">
                                        <h3>Applicant Fills Out information and pays</h3>
                                        <span>Email the applicants a form to collect their information and consent.</span>
                                        <label class="new">New</label>
                                    </li>
                                </ul>
                            </div>
                          
                        </div>
                      </div>
                        <div class="card-footer">
                            <button disabled class="back-btn">Back</button>
                            <button type="submit" class="next-btn">Continue</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
              </section>
        </div>
@include('includes.footer')
