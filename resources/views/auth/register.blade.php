@include('includes.home-header')


<section class="customer-sec">
    <div class="row g-0">
        <div class="col-md-6 customerlft-sec">
            <div class="customer-form">

                <a href="#" class="logo">
                    <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                </a>
                <div class="custform-tabs">
                    <!-- Inside your Blade template (e.g., auth.register) -->


                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="landlord">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Register As Landlord</button>
                        </li>
                        <li class="nav-item" role="tenant">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab"
                                aria-controls="pills-profile" aria-selected="false">Register As tenant</button>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <input type="hidden" id="user_type" name="user_type" value="landlord">
                                <form class="register-form">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                placeholder="Enter your First Name">
                                            <x-input-error :messages="$errors->get('firstname')" class="mt-2 text-danger" />

                                        </div>
                                        <div class="form-group col-6">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" class="form-control" id="lastname" name="lastname"
                                                placeholder="Enter your Last Name">
                                            <x-input-error :messages="$errors->get('lastname')" class="mt-2 text-danger" />

                                        </div>
                                        <div class="form-group col-12">
                                            <label>Company Name (Optional)</label>
                                            <input type="CompanyName" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your Company Name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Phone Number<span>*</span></label>
                                            <input type="number" class="form-control" id="phone" name="phone"
                                                placeholder="Enter your Phone Number">
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your Email Address">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        </div>
                                        <h4>Security Requirements</h4>
                                        <div class="form-group col-6">
                                            <label>Password<span>*</span></label>
                                            <div class="password-div">
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter Your Password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Confirm Password<span>*</span></label>
                                            <div class="password-div">
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation"
                                                    placeholder="Enter Your Confirm Password">
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Street Address</label>
                                            <input type="text" class="form-control" id="street_address"
                                                name="street_address" placeholder="Enter Your street address">
                                            <x-input-error :messages="$errors->get('street_address')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Country</label>
                                            <div class="select-arrow">
                                                @if(!empty($countries))
                                                <select onchange="getStates(this)" class="form-control" id="country" name="country">
                                                    <option value="">Select Country</option>
                                                    @foreach($countries as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                                @endif
                                                <x-input-error :messages="$errors->get('country')" class="mt-2 text-danger" />
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>State</label>
                                            <div class="select-arrow">

                                                <select class="form-control" id="state" name="state">



                                                </select>

                                                <x-input-error :messages="$errors->get('state')" class="mt-2 text-danger" />
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>City</label>
                                            <div class="select-arrow">
                                                <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Enter your City">
                                                <x-input-error :messages="$errors->get('city')" class="mt-2 text-danger" />
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Postal Code</label>
                                            <input type="number" class="form-control" id="zipcode" name="zipcode"
                                                placeholder="Enter your postal code">
                                            <x-input-error :messages="$errors->get('zipcode')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="form-group col-12 upload-doc">
                                            <label>Upload Document <span>(driver's license or passport. If
                                                    corporation-articles of incorporation)</span></label>
                                            <div class="upload-sec">
                                                <input id="uploadFile" class="f-input form-control"
                                                    placeholder="Choose Document" />
                                                <div class="fileUpload btn btn--browse">
                                                    <span>Browse</span>
                                                    <input id="uploadBtn" type="file" name="file" class="upload" />
                                                </div>

                                            </div>
                                            <x-input-error :messages="$errors->get('file')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="form-group col-12 checkbox-sec">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">I agree to the <a
                                                        href="#"> terms and conditions</a> </label>
                                            </div>
                                            <button class="btn btn-screening">Start Screening</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <form class="registertenat-form">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>First Name<span>*</span></label>
                                            <input type="name" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your First Name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Last Name<span>*</span></label>
                                            <input type="lastName" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your Last Name">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Company Name (Optional)</label>
                                            <input type="CompanyName" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your Company Name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Phone Number<span>*</span></label>
                                            <input type="Number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your Phone Number">
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Email Address<span>*</span></label>
                                            <input type="emailAddress" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your Email Address">
                                        </div>
                                        <h4>Security Requirements</h4>
                                        <div class="form-group col-6">
                                            <label>Password<span>*</span></label>
                                            <div class="password-div">
                                                <input type="password" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Your Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Confirm Password<span>*</span></label>
                                            <div class="password-div">
                                                <input type="password" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter Your Confirm Password">
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Street Address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Your street address">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Province</label>
                                            <div class="select-arrow">
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>City</label>
                                            <div class="select-arrow">
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                    <option>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Postal Code</label>
                                            <input type="Number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter your postal code">
                                        </div>
                                        <div class="form-group col-12 upload-doc">
                                            <label>Upload Document <span>(driver's license or passport. If
                                                    corporation-articles of incorporation)</span></label>
                                            <div class="upload-sec">
                                                <input id="uploadFile" class="f-input form-control"
                                                    placeholder="Choose Document" />
                                                <div class="fileUpload btn btn--browse">
                                                    <span>Browse</span>
                                                    <input id="uploadBtn" type="file" class="upload" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 checkbox-sec">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">I agree to the <a
                                                        href="#"> terms and conditions</a> </label>
                                            </div>
                                            <x-primary-button class="btn btn-screening">
                                                {{ __('Start Screening') }}
                                            </x-primary-button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="already-login">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                                <span>Or</span>
                                <ul>
                                    <li><a href="#"><i class="bi bi-google"></i></a></li>
                                    <li><a href="#"><i class="bi bi-apple"></i></a></li>
                                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 customerrgt-sec">
            <div class="customerImg">
                <img class="img-fluid" src="{{ asset('public/assets/images/customerPro-img.png') }}">
            </div>
        </div>
    </div>
</section>
@include('includes.home-footer')
