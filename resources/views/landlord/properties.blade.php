@include('includes.header')

<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Content -->
    <section class="main-wrapper">

        @switch(Auth::user()->role_id)
            @case(1)
                {{-- SuperAdmin --}}
                @include('layouts.admin.sidebar')
            @break

            @case(2)
                {{-- Landlord --}}
                @include('layouts.landlord.sidebar')
            @break

            @case(3)
                {{-- Tenant --}}
                @include('layouts.tenant.sidebar')
            @break
        @endswitch



        <!-----incude main layout-->

        <div class="main-content">

            <div class="cont-wrapper">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        @if($document_verified==0)
                        <p class="alert alert-warning">Since your Documents are under Review, You can continue with creating Properties and once its verified, you can invite or allow tenants to bid or apply for it</p>
                        @endif
                    </div>
                    <div class="col-sm-6 col-lg-6">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>
                    <div class="col-sm-6 col-lg-6">

                    </div>
                </div>
                <div class="my-property">
                    <div class="card-head">

                        <h3>My properties <span>Only add properties for which you need to screen tenants.</span></h3>

                    </div>
                    <div class="custform-tabs">
                        <form name="add_property" action="{{ route('property') }}" method="post"  enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Street Address</label>
                                        <div class="select-arrow">
                                           <input type="text" class="form-control" placeholder="Street Address" name="address">
                                           <x-input-error :messages="$errors->get('address')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Apartment #</label>
                                        <div class="select-arrow">
                                            <input type="text" class="form-control" placeholder="Apartment #" name="apartment">
                                            <x-input-error :messages="$errors->get('apartment')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rent Amount</label>
                                        <div class="select-arrow">
                                            <input type="number" class="form-control" min="100" max="20000" placeholder="Enter Rent Amount" name="amount">
                                            <x-input-error :messages="$errors->get('amount')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <div class="select-arrow">
                                            <input type="text" class="form-control" placeholder="Province" name="province">
                                            <x-input-error :messages="$errors->get('province')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Date Available</label>
                                        <input type="date" class="form-control" name="date_available"
                                            placeholder="DD/MM/YYYY">
                                            <x-input-error :messages="$errors->get('date_available')" class="mt-2 text-danger" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control" name="zipcode"
                                            placeholder="Enter your postal code">
                                            <x-input-error :messages="$errors->get('zipcode')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group upload-doc">
                                        <label>Upload Document</label>
                                        <div class="upload-sec">

                                            <div class="fileUpload btn btn--browse">
                                                <span>Browse</span>
                                                <input onchange="uploadProperty(event)" id="uploadBtn" type="file" name="file" class="upload" accept=".docx,.doc,.pdf,.xlsx,.txt">

                                            </div>

                                        </div>
                                        <div id="imagePreview" alt="Image Preview" style="display:none; max-width:100%; height:auto;"></div>
                                        <div class="mt-2 text text-danger invalidfile"></div>
                                        <x-input-error :messages="$errors->get('file')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" name="agreement" class="form-check-input" id="agreement">
                                        <label class="form-check-label" for="exampleCheck1">I certify that I am the
                                            owner of the property</label>
                                            <x-input-error :messages="$errors->get('agreement')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                            </div>
                            <button style="transform: translate(0px, -26px);" type="submit" class="add-btn">Add Property</button>
                        </form>
                    </div>

                </div>
                <div class="added-pro">

                    <div class="row">
                        <h2>Added Properties</h2>
                    @if(isset($properties)&&!empty($properties))

                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Address</th>
                                        <th scope="col">Available Dates</th>
                                        <th scope="col">Documents</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($properties as $property)
                                        @php
                                         $get_screening_status=$property->screening_status;

                                        @endphp
                                        <form name="property_screening" action="{{ route('property-screening') }}" method="post"  enctype="multipart/form-data">
                                            @csrf

                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        <tr>
                                            <td>{{  $property->apartment }} ,{{  $property->street_address }}, {{ $property->zipcode }}</td>
                                            <td><img class="img-fluid" src="{{ asset('public/assets/images/date-icon.png') }}"> {{ !empty($property->date_available)?human_readable_date($property->date_available):""}}</td>
                                            <td>
                                                @if(!empty($property->property_docs) && !empty($base_url))
                                                @if(strpos($property->property_docs,'.doc')>-1 || strpos($property->property_docs,'.docx')>-1)
                                                <a target="_blank" href="{!! $base_url.'/storage/app/'.$property->property_docs !!}">Word Document</a>

                                                @elseif(strpos($property->property_docs,'.xls')>-1 || strpos($property->property_docs,'.xlxs')>-1)
                                                <a target="_blank" href="{!! $base_url.'/storage/app/'.$property->property_docs !!}">Excel Document</a>

                                                @elseif(strpos($property->property_docs,'.pdf')>-1)
                                                <a target="_blank" href="{!! $base_url.'/storage/app/'.$property->property_docs !!}">Pdf Document</a>

                                                @elseif((strpos($property->property_docs,'.text')>-1))
                                                <a target="_blank" href="{!! $base_url.'/storage/app/'.$property->property_docs !!}">Text Document</a>

                                                @endif
                                                @endif
                                            </td>
                                            <td>
                                                @switch($get_screening_status)

                                                    @case ('0')
                                                    <button class="notscreening" type="submit" name="submit">Start Screening</button>
                                                       @break;
                                                    @case('1')
                                                      <button disabled class="disabled" type="submit" name="submit">Under Screening</button>

                                                        @break
                                                    @case('2')
                                                    <button disabled class="disabled" type="submit" name="submit">Review Pending</button>
                                                        @break;

                                                    @case ('3')
                                                    <button disabled class="disabled" type="submit" name="submit">Approved</button>
                                                        @break

                                                    @case ('4')
                                                    <button disabled class="disabled" type="submit" name="submit">Rejected</button>
                                                        @break
                                                    @default

                                                @endswitch
                                                <td>


                                        </tr>
                                        </form>
                                        @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>


                    @else

                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <h4 class="text-danger text-sm text-center">Sorry No Property is Availabe</h4>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6">
                        <div class="table-responsive">


                        @if(isset($screening_properties)&&!empty($screening_properties))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Screening Progress</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($screening_properties as $sp)
                                @php

                                $uploaded_report=!empty($sp->uploaded_report)?$sp->uploaded_report:"";
                                @endphp
                                <tr>
                                    <td>{{ $sp->street_address }}</td>
                                    <td>
                                        @switch($sp->screening_status)
                                            @case('1')
                                            <button class="send-req">Request Sent</button>
                                               <lable>awaiting documentation.</lable>

                                                @break

                                            @case('2')
                                            <span class="review">Review in Progress</span>

                                                @break

                                            @case ('3')
                                            <span class="complete">Completed</span>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            {!! (!empty($uploaded_report)) ? '<button onclick="downloadReport(\''. $uploaded_report .'\')">Download Report</button>' : '<span class="text text-danger">Report Pending</span>' !!}


                                                @break

                                            @case ('4')
                                            <span class="rejected">Rejected</span> &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;<span class="text-danger"><em>Unfortunately your Screening Rejected, Kindly contact admin</em></span>

                                                @break
                                            @default

                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach


                         </tbody>

                            </table>
                            @else

                            <h4 class="text-danger text-sm text-center">Sorry No Property is Under SCreening</h4>


                            @endif
                        </div>

                    </div>



                </div><!--row end-->


            </div>
        </div>

    </section>
</div>
@include('includes.footer')
