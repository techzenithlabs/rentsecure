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
                    <form method="post" action="{{ url('landlord/screening/tenant/step3') }}" name="formstep2">
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
                            </div>
                            <div class="form-content">
                            <div class="card-body whopays-sec min-hieght">
                                <h2>Select 	Report<span>Applicant currently resides in</span></h2>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {!! !empty($country)&&$country=="canada"?'checked':'' !!} name="country" type="radio" id="inlineradio1" value="canada">
                                        <label class="form-check-label" for="inlineradio1">Canada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {!! !empty($country)&&$country=="usa"?'checked':'' !!} name="country" type="radio" id="inlineradio2" value="usa">
                                        <label class="form-check-label" for="inlineradio2">United States of America	</label>
                                    </div>
                                <div class="payInfo-sec1 mt-4">
                                    <ul>
                                        <li>
                                            <h3>Credit Report, and Background Check <label class="new">Best Value</label></h3>

                                            <div class="row">
                                                <div class="col-sm-3 col-lg-3"><h3 class="mt-4">$32.98 <span>/ Report</span></h3></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View Sample</button></div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4 col-lg-4">
                                                    <ul class="subpara">
                                                        <li>Long Form equifax credit report</li>
                                                        <li>Current and former addresses</li>
                                                        <li>aliases</li>
                                                        <li>Employment confirmation</li>
                                                        <li>Open and closed credit Facilities (Trade lines)</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4 col-lg-4">
                                                    <ul class="subpara">
                                                        <li>credit balances</li>
                                                        <li>collections</li>
                                                        <li>bankruptcies</li>
                                                        <li>inquiries</li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-4 col-lg-4">
                                                    <ul class="subpara"><li>Global Public information search for:criminal records, court decisions, negative press,Sanctions andmore</li></ul>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                                <div class="payInfo-sec1 mt-4">
                                    <ul>
                                        <li>
                                            <h3>Credit Report</h3>
                                            <div class="row">
                                                <div class="col-sm-3 col-lg-3"><h3 class="mt-4 pull-left">$32.98 <span>/ Report</span></h3></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View Sample</button></div>
                                            </div>

                                            <hr>

                                        </li>

                                    </ul>
                                </div>
                                <div class="payInfo-sec1 mt-4">
                                    <ul>
                                        <li>
                                            <h3>Background Check</h3>
                                            <div class="row">
                                                <div class="col-sm-3 col-lg-3"><h3 class="mt-4 pull-left">$16.99 <span>/ Report</span></h3></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"></div>
                                                <div class="col-sm-3 col-lg-3"><button class="view-sample btn btn-primary">View Sample</button></div>
                                            </div>

                                            <hr>

                                        </li>

                                    </ul>
                                </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('landlord/screening/tenant/step1') }}" class="back-btn">Back</a>
                                <button type="submit" class="next-btn">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
              </section>
        </div>
@include('includes.footer')
