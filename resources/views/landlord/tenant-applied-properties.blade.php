@include('includes.header')
@php
use Carbon\Carbon;
@endphp

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

                        <h3>Tenants Applied</h3>

                    </div>
                    <div class="custform-tabs">
                        <div class="table-responsive">
                            @if(!empty($tenant_applied))
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr No</th>
                                        <th scope="col">Properties</th>
                                        <th scope="col">Applied By</th>
                                        <th scope="col">Applied Date</th>
                      .
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach($tenant_applied as $key=> $tenant)
                                        @php
                                         $applied_date=Carbon::parse($tenant->created_at);
                                         $applied_on= $applied_date->format('l jS Y');
                                         $applied_at=$applied_date->format('H:i A');

                                        @endphp
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{!! $tenant->address .','.$tenant->city.','.$tenant->postalcode!!}</td>
                                            <td>{!! $tenant->tenant_first_name .' '.$tenant->tenant_middle_name.' '.$tenant->tenant_last_name!!}</td>
                                            <td>{!!  $applied_on.' at '.$applied_at!!}</td>
                                        </tr>

                                         @endforeach


                                </tbody>
                            </table>
                            @else
                            <h3 class="text-danger text-center">Sorry No Information Available</h3>

                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>
</div>
@include('includes.footer')
