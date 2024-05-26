@php
use Illuminate\Support\Facades\App;
@endphp
@include('includes.header')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            @php
            $getLandlordData=getLandlordScreening();

            $baseURL=config('app.url').'/storage/app/';


            @endphp

            <section class="main-wrapper">
                @include('layouts.admin.sidebar')
                <div class="main-content">>
                <div class="cont-wrapper">
                    <div class="tenant-screening">
                        <div class="card-head">
                            <h3>Landlords</h3>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6"></div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="adminactions pull-right">
                                        <div style="display:none" class="verifiedsuccess alert alert-success"></div>
                                        <div style="display:none" class="verifiedfailed alert alert-danger"></div>
                                      </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-content">
                        <div class="card-body whopays-sec min-hieght">
                            @if(isset($getLandlordData)&&!empty($getLandlordData))
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Street Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">State</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Documents</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                             @php
                             $cnt=1;
                           ;
                             @endphp
                            @foreach($getLandlordData as $user)

                             @php

                             $userId=$user->user_id;
                             $userName=$user->firstname." ".$user->lastname;
                             $userEmail=$user->email;
                             $userPhone=$user->phone;
                             $userAddress=$user->street_address;
                             $userCity=$user->city;
                             $userState=$user->state;
                             $userCountry=$user->country;
                             $userZip=$user->zipcode;
                             $userdoctype=$user->document_type;
                             $userdocument=$user->documents;
                             $isVerified=$user->is_verified;
                             @endphp
                             <tr>
                                <td>{{ $cnt++ }}</td>
                                <td>{{ $userName }}</td>
                                <td>{{ $userEmail }}</td>
                                <td>{{ $userPhone }}</td>
                                <td>{{ $userAddress }}</td>
                                <td>{{ $userCity }}</td>
                                <td>{{ !empty(getStateById($userState))?getStateById($userState):"N/A" }}</td>
                                <td>{{ !empty(getCountryById($userCountry))?getCountryById($userCountry):"N/A" }}</td>

                                <td><em>{{ $userdoctype }}</em> <p><a style="color:blue" target="blank" href="{{ $baseURL.$userdocument }}">View Document</a></p></td>
                                <td>
                                    @if($isVerified==0)
                                        <a onclick="takeAction(event,'{{$userId}}',1)" style="padding:4px;font-size:0.8em" class="btn btn-success">Approve</a><br/>
                                        <a onclick="takeAction(event,'{{$userId}}',2)" style="padding:4px;font-size:0.8em" class="btn btn-danger">Reject</a></td>
                                    @elseif($isVerified==1)
                                    <a disabled style="padding:4px;font-size:0.8em" class="btn btn-success disabled">Approve</a><br/>
                                    <a onclick="takeAction(event,'{{$userId}}',2)" style="padding:4px;font-size:0.8em" class="btn btn-danger">Reject</a></td>
                                    @elseif($isVerified==2)
                                    <a onclick="takeAction(event,'{{$userId}}',1)" style="padding:4px;font-size:0.8em" class="btn btn-success">Approve</a><br/>
                                    <a disabled style="padding:4px;font-size:0.8em" class="btn btn-danger disabled">Reject</a></td>
                                    @endif

                              </tr>
                            @endforeach
                                </tbody>
                                <table
                            @else
                            <h4 class="text-danger text-center">Sorry Record Doesn't Exists 😞</h4>
                            @endif


                        </div>
                        </div>
                        <div class="card-footer">
                            <button class="back-btn">Back</button>
                            <button class="next-btn">Continue</button>
                        </div>
                    </div>
                </div>

                </div>



            </section>
        </div>
@include('includes.footer')

