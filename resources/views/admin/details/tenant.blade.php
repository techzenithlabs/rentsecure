@php
use Illuminate\Support\Facades\App;
@endphp
@include('includes.header')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            @php

            $getenantData=!empty($tenants)?$tenants:[];
            $baseURL=config('app.url').'/storage/app/';


            @endphp

            <section class="main-wrapper">
                @include('layouts.admin.sidebar')
                <div class="main-content">>
                <div class="cont-wrapper">
                    <div class="tenant-screening">
                        <div class="card-head">
                            <h3>Tenant Details</h3> <a href="{{ route('screening.tenant') }}" style="margin-top:-30px" class="btn btn-primary float-right">Back</a>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6"></div>
                                <div class="col-sm-6 col-lg-6">
                                    <div class="adminactions pull-right">

                                      </div>
                                </div>
                            </div>


                        </div>
                        <div class="form-content">
                        <div class="card-body whopays-sec min-hieght">
                            @if(isset($tenantinfo)&&!empty($tenantinfo))
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                          @foreach($tenantinfo as $tenant)

                          <p><label><strong>Property :</strong></label> {{ $tenant->property_address }}</p><br/>
                          <p><label><strong>Start Date :</strong></label> {{ $tenant->start_date }}</p><br/>
                          <p><label><strong>Rent :</strong></label> {{ $tenant->rent }}</p><br/>
                          <p><label><strong>Due Date :</strong></label> {{ $tenant->due_date }}</p><br/>
                          <p><label><strong>Applicant Name :</strong></label> {{ $tenant->applicant_name }}</p><br/>
                          <p><label><strong>Applicant DOB :</strong></label> {{ $tenant->applicant_dob }}</p><br/>
                          <p><label><strong>Applicant Occupation :</strong></label> {{ $tenant->applicant_occupation }}</p><br/>
                          <p><label><strong>Applicant SIN :</strong></label> {{ $tenant->applicant_sin }}</p><br/>
                          <p><label><strong>Applicant License :</strong></label> {{ $tenant->applicant_license }}</p><br/>
                          <p><label><strong>Applicant Declaraton Signature :</strong></label> {{ $tenant->dec_signature }}</p><br/>
                          <p><label><strong>Applicant Declaraton Date :</strong></label> {{ $tenant->dec_date }}</p><br/>



                          @endforeach
                        </div>
                           </div>
                            @endif
                        </div>


                        </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>

                </div>



            </section>
        </div>
@include('includes.footer')

