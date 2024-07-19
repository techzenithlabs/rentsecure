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
                    <form method="post" action="{{ url('landlord/screening/tenant/step4') }}" id="formstep3" name="formstep3">
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
                                        <li class="completed">
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

                                <div class="card-body whopays-sec min-hieght">
                                    <h6>Applicant Form</h6>

                                        <div class="form-content">

                                            <div class="ms-4 text text-danger paymentinfoerror"></div>
                                            <div class="ms-4 text text-danger countryerror"></div>
                                            <input type="hidden" name="paymentinfo" value="{{!empty($paymeninfo)?$paymeninfo:"landlord" }}">
                                            <input type="hidden" name="country" value="{{!empty($country)?$country:"" }}">

                                        <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-3 col-lg-3">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">First Name:</label>
                                                <p><span><input class="form-control" type="text" name="firstname" value="{{ !empty($firstname)?$firstname:'' }}"></span></p>
                                                <div class="mt-2 text text-danger firstnameerror"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">Last Name:</label>
                                                <p><span><input class="form-control" type="text" name="lastname" value="{{ !empty($lastname)?$lastname:'' }}"></span></p>
                                                <div class="mt-2 text text-danger lastnameerror"></div>

                                            </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">SIN:</label>
                                                <p><span><input class="form-control" type="text" name="sin" value="{{ !empty($sin)?$sin:'' }}"></span></p>
                                                <div class="mt-2 text text-danger sineerror"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                    <button class="view-sample btn btn-primary"><i class="fas fa-pencil-alt"></i>&nbsp; Edit</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 2nd Row -->

                                        <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-3 col-lg-3">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">Middle Name:</label>
                                                <p><span><input class="form-control"  type="text" name="middlename" value="{{ !empty($middlename)?$middlename:'' }}"></span></p>
                                                <div class="mt-2 text text-danger middlenameerror"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">Date of Birth:</label>

                                                <p><span><input class="form-control"  type="date" name="dob" value="{{ !empty($dob)?$dob:'' }}"></span></p>
                                                <div class="mt-2 text text-danger doberror"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">
                                                <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">Current Address:</label>

                                                <p><span><input class="form-control" type="text" name="address" value="{{ !empty($address)?$address:'' }}"></span></p>
                                                <div class="mt-2 text text-danger addresserror"></div>

                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-lg-3">

                                            </div>
                                        </div>
                                        </div>

                                        <div class="form-content">
                                            <h6><strong>Applicant Form</strong></h6>
                                            <div class="container mt-3">
                                                <label>
                                                    <input type="checkbox" {!! !empty($applicant_confirm)?'checked':''!!} name="applicant_confirm">
                                                    <p class="initial-text">I confirm I have entered the applicant's detials correctly and acknowledge that I will be charged for searches even if no credit file is found. For best results ensure the applicant's name is spelled exactly as written on the government issued ID and always enter a SIN or SSN when available.</p>

                                                </label>
                                                <div class="mt-2 text text-danger applicant_confirmerror"></div>
                                            </div>
                                        </div>

                                        <div class="form-content">
                                            <h6><strong>Consent and Agreement</strong></h6>
                                            <div class="container mt-3">
                                                <label>
                                                    <input type="checkbox" {!! !empty($applicant_consignment)?'checked':''!!} name="applicant_consignment">
                                                    <p class="initial-text">I confirm I have written consent from all individuals before searching their
                                                        records to view their credit report,
                                                        background check, and/or tenant records, as applicable, and am using
                                                        such for tenancy purposes. I understand that my searches will be recorded on the records and visible. I acknowledge that it is possible that
                                                        multiple people may have the same name and same date of birth, si I should confirm which addresses the individual lived at previously. I acknowledge that if the consumer requests, I will inform the consumer of the name and address of the Credit Bureau supplying the report. i agree to the Consumer Reports Access Agreement.</p>
                                                </label>
                                                <div class="mt-2 text text-danger applicant_consignmentrror"></div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('landlord/screening/tenant/step2') }}" class="back-btn">Back</a>
                                <button type="submit" class="next-btn">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
              </section>
        </div>

@include('includes.footer')
