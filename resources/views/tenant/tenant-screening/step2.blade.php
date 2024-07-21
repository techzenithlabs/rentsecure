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
                    @php
                      $tenantpropertyid=[];
                      $tenantpropertyval=[];
                      $propertydetails=!empty($property_details)?$property_details:[];
                      if(!empty($propertydetails)){
                        foreach($propertydetails as $key=>$val){

                            if($key=="id"){
                                $tenantpropertyid[]=$val;
                            }

                            if($key=="street_address"){
                                $tenantpropertyval[]=$val;
                            }

                        }
                      }

                      $gettenantproperty=array_combine($tenantpropertyid,$tenantpropertyval);

                   @endphp
                    <form method="post" action="{{ url('tenant/screening/step3') }}" id="tenantformstep2" name="tenantformstep2">
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
                                        <li class="completed">
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

                                <div class="card-body min-hieght">

                                        <div class="form-content">

                                            <div class="ms-4 text text-danger paymentinfoerror"></div>
                                            <div class="ms-4 text text-danger countryerror"></div>


                                        <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">First Name</label><span class="text-danger">*</span>
                                                <p><span><input class="form-control" type="text" name="firstname" placeholder="Enter First Name" value="{{ !empty($firstname)?$firstname:'' }}"></span></p>
                                                <div class="mt-2 text text-danger firstnameerror"></div>
                                            </div>
                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="applicant1">Middle Name</label>
                                                    <p><span><input class="form-control" type="text" name="middlename" placeholder="Enter Middle Name" value="{{ !empty($middlename)?$middlename:'' }}"></span></p>
                                                    <div class="mt-2 text text-danger middlenameerror"></div>
                                                </div>
                                                </div>
                                            <div class="col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                <label class="custom-label font-weight-bold" for="applicant1">Last Name</label><span class="text-danger">*</span>
                                                <p><span><input class="form-control" type="text" name="lastname" placeholder="Enter Last Name" value="{{ !empty($lastname)?$lastname:'' }}"></span></p>
                                                <div class="mt-2 text text-danger lastnameerror"></div>

                                            </div>
                                            </div>


                                        </div>

                                        <!-- 2nd Row -->

                                        <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="applicant1">DOB <span class="text-danger">*</span></label>

                                                    <p><span><input class="form-control"  type="date" name="dob" value="{{ !empty($dob)?$dob:'' }}"></span></p>
                                                    <div class="mt-2 text text-danger doberror"></div>
                                                </div>

                                            </div>
                                              <div class="col-sm-4 col-lg-4">
                                                    <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="applicant1">SIN:</label>
                                                    <p><span><input class="form-control" type="text" name="sin" value="{{ !empty($sin)?$sin:'' }}" placeholder="Enter SIN"></span></p>
                                                    <div class="mt-2 text text-danger sineerror"></div>
                                                    </div>


                                            </div>
                                            <div class="col-sm-4 col-lg-4">


                                            </div>

                                        </div>

                                         <!-- 3rd Row -->

                                         <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="province">Street Address</label><span class="text-danger">*</span>

                                                    <p><span><input class="form-control" type="text" name="address" value="{{ !empty($address)?$address:'' }}" placeholder="Enter Street Address"></span></p>
                                                    <div class="mt-2 text text-danger addresserror"></div>

                                                    </div>

                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                    <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="postalcpde">Postal Code</label><span class="text-danger">*</span>
                                                    <p><span><input class="form-control" type="text" id="postalcode" name="postalcode" value="{{ !empty($postalcode)?$postalcode:'' }}" placeholder="Enter Postal Code"></span></p>
                                                    <div class="mt-2 text text-danger postalcodeeerror"></div>
                                                    </div>


                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="applicant1">City/Town</label><span class="text-danger">*</span>
                                                    <p><span><input class="form-control" type="text" name="city" placeholder="Enter City"  value="{{ !empty($city)?$city:'' }}"></span></p>
                                                    <div class="mt-2 text text-danger cityerror"></div>
                                                </div>

                                            </div>

                                        </div>


                                       <!--4th Row-->
                                        <div class="row mt-4 mb-4">
                                            <!-- 1st Row -->
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="province">Province</label><span class="text-danger">*</span>

                                                    <p><span><input class="form-control" type="text" id="province" name="province"  value="{{ !empty($province)?$province:'' }}" placeholder="Enter Province"></span></p>
                                                    <div class="mt-2 text text-danger provinceerror"></div>

                                                    </div>

                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <inpu type="hidden" name="propertyscreen" value="{{ !empty($propertyscreen)?$propertyscreen:'' }}"/>



                                            </div>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="form-group">
                                                    <label class="custom-label font-weight-bold" for="applicant1">Select Which Property the Screening is For</label><span class="text-danger">*</span>
                                                    <p><span>
                                                    <select name="propertyscreen" class="form-control">
                                                     <option value="">Select Property</option>
                                                     @if(!empty($gettenantproperty))
                                                     @foreach($gettenantproperty as $key=>$val)
                                                     @if(!empty($propertyscreen) && $propertyscreen==$key)
                                                        <option selected value="{{ $key }}">{{ $val }}</option>
                                                     @else
                                                        <option value="{{ $key }}">{{ $val }}</option>

                                                     @endif

                                                     @endforeach
                                                     @endif
                                                    </select>
                                                    </span></p>
                                                    <div class="mt-2 text text-danger propertyscreenerror"></div>
                                                </div>

                                            </div>

                                        </div>

                                        <button type="submit" class="next-btn">Continue</button>



                                        </div>


                                </div>
                            </div>

                        </div>
                    </form>
                </div>
              </section>
        </div>

@include('includes.footer')
