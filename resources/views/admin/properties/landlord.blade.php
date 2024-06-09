@include('includes.header')

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->

            <section class="main-wrapper">
                @include('layouts.admin.sidebar')
                <div class="main-content">>
                <div class="cont-wrapper" style="min-height:500px">
                    <!-- success message -->
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                    </div>
                    @endif

                    <!-- error message -->
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}

                    </div>
                    @endif

                    <div style="display:none" class="screeningsuccessstatus alert alert-success alert-dismissible fade show">

                    </div>

                    <div style="display:none" class="screeningerrorstatus alert alert-danger alert-dismissible fade show">

                    </div>



                    <div class="table-responsive">
                     @php
                        $filePath = config('app.url').'/storage/app/';
                     @endphp
                        @if(isset($properties)&&!empty($properties))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Land Lord Name</th>
                                    <th scope="col">Property Details</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Documents</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $key=>$property)
                                <form name="admin_screening" action="{{ route('property.landlord') }}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                @php
                                 $admin_screening_status=$property->screening_status;
                                @endphp
                                <input type="hidden" name="landlord_id" value="{{ $property->landlord_id }}">
                                <input type="hidden" name="property_id" value="{{ $property->id }}">

                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ getuserbyId($property->landlord_id) }}</td>
                                    <td>{{ $property->apartment }}, {{$property->street_address}}, {{$property->province}}, {{$property->zipcode }}</td>
                                    <td> <p class="mt-2"><img width="40" src="{{ $filePath.$property->property_images }}"></p></td>
                                    <td></td>
                                    <td>
                                        @switch($admin_screening_status)
                                            @case('1') <!-- Landlord Requested For Screening -->
                                            <button class="btn btn-primary">Start Review</button>

                                            @break
                                            @case('2')  <!-- Admin is Screening -->
                                            <div class="allstatus">
                                            <button class="btn btn-warning">Review in Progress</button>
                                            <a onclick="changeStatus(event,'approve','{{$property->landlord_id}}','{{$property->id}}')" role="button" title="Approve"><img src="{{ asset('public/assets/images/icons/approve.png') }}"></a>
                                            <a onclick="changeStatus(event,'reject','{{$property->landlord_id}}','{{$property->id}}')" role="button" title="Reject"><img src="{{ asset('public/assets/images/icons/reject.png') }}"></a>
                                            </div>

                                                @break
                                            @case('3')  <!-- Admin Approved -->
                                            <button disabled class="btn btn-success">Approved</button>

                                                @break
                                            @case('4') <!-- Admin Rejected -->
                                            <button disabled class="btn btn-danger">Rejected</button>

                                                @break

                                            @default

                                        @endswitch

                                    </td>

                                </tr>
                                </form>
                                @endforeach


                            </tbody>
                        </table>
                        @else
                        <h4 class="text-danger text-sm text-center mt-4">Sorry No Property is Availabe for Screening</h4>
                        @endif
                    </div>


                </div>

                </div>



            </section>
        </div>
@include('includes.footer')

