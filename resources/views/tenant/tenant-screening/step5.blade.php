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
                    <form method="post" action="{{ url('landlord/tenant-screening') }}" id="formstep4" name="formstep4">
                        @csrf
                        <input type="hidden" name="country" value="{{ !empty($country)?$country:'' }}">
                        <input type="hidden" name="paymentinfo" value="{{ !empty($paymentinfo)?$paymentinfo:'' }}">
                        <input type="hidden" name="firstname" value="{{ !empty($firstname)?$firstname:'' }}">
                        <input type="hidden" name="lastname" value="{{ !empty($lastname)?$lastname:'' }}">
                        <input type="hidden" name="middlename" value="{{ !empty($middlename)?$middlename:'' }}">
                        <input type="hidden" name="sin" value="{{ !empty($sin)?$sin:'' }}">
                        <input type="hidden" name="dob" value="{{ !empty($dob)?$dob:'' }}">
                        <input type="hidden" name="address" value="{{ !empty($address)?$address:'' }}">
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
                                        <li class="completed">
                                            <label>Step 3/4</label>
                                            <span></span>
                                        </li>
                                        <li class="completed">
                                            <label>Step 4/4</label>
                                            <span></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-content">
                            <div style="display:none" class="ms-4 alert alert-success screeningsuccess"></div>
                            <div style="display:none" class="ms-4 alert alert-danger screeningerror"></div>
                            <div class="card-body whopays-sec min-hieght">
                                <h2>Invite Applicants<span>you may invite several applicants at once. Applicants will receive an email requesting to fill in their information and pay for a credit report.</span></h2>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-6"><button class="view-sample btn btn-primary">View Invitation Sample</button>
                                        <h2 class="mt-3"><span>You will be notified by email once that process is complete.</span></h2>
                                        </div>
                                        <div class="col-sm-6 col-lg-6"></div>

                                    </div>

                                    <div class="row mt-4 mb-4">
                                        <!-- 1st Row -->
                                        <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="property">Property this screening is for:</label>
                                            <select class="custom-select form-control" id="property" name="property">
                                                <option value="">Select A Property</option>
                                                @if(!empty($properties))
                                                @foreach($properties as $prop)
                                                <option value="{{$prop['id']}}">{{ $prop['address'] }}</option>
                                                @endforeach
                                                @endif
                                            <!-- Options for property -->
                                            </select>
                                            <div class="mt-2 text text-danger propertyerror"></div>

                                        </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="custom-label" for="unit">Unit# (optional):</label>
                                            <select class="custom-select form-control" id="unit">
                                                <option value="">Select A Unit</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- 2nd Row -->
                                    <div class="row">
                                        <h6 class="mb-2">Applicant 1</h6>
                                        <div class="col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="custom-label" for="applicant1">First Name:</label>
                                            <input type="text" placeholder="Enter First Name" name="tenant_first_name" class="custom-input form-control" id="applicant1">
                                            <div class="mt-2 text text-danger firstnameerror"></div>
                                        </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="custom-label" for="lastName">Last Name:</label>
                                            <input type="text" placeholder="Enter Last Name" name="tenant_last_name" class="custom-input form-control" id="lastName">
                                            <div class="mt-2 text text-danger lastnameerror"></div>
                                        </div>
                                        </div>
                                        <div class="col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="custom-label" for="email">Email*:</label>
                                            <input type="email" placeholder="Enter Email" name="tenant_email" class="custom-input form-control" id="email">
                                            <div class="mt-2 text text-danger emailerror"></div>
                                        </div>
                                        </div>
                                    </div>

                                    <div style="display:none" class="row mt-4 mb-4">
                                        <div class="col-sm-6 col-lg-6"><button class="view-sample btn btn-primary"><i class="fas fa-plus"></i> Add Additional Applicant</button>

                                        </div>
                                        <div class="col-sm-6 col-lg-6"></div>

                                    </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('landlord/screening/tenant/step3') }}" class="back-btn">Back</a>
                            <button type="submit" class="next-btn">Send Invite</button>
                        </div>
                        </div>
                    </form>
                </div>
               </div>
              </section>
        </div>

    <!---Model--->
        <div class="modal fade show" id="tenatmodal" style="padding-right: 0px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="screen-complete close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <h4 style="font-size:1.5rem" class="text-center">Applicant invite has been sent</h4>
                <p style="margin-top: 10px;margin-bottom: 20px;line-height: 1.5;" class="text-center mt-3"><span>You will be notified when the applicant has completed their application.</span></p>
                <center><button class="view-applicant btn btn-primary text-center">View Applicants Reports</button></center>
                <p class="mt-3 text-center screen-other"><a href="{{ route('landlord.screening.tenant') }}">+ Screen Another tenant</a></p>
            </div>

            <!-- Modal Footer -->


            </div>
        </div>
        </div>
    <!---Model--->
@include('includes.footer')
