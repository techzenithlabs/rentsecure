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

              <!-----Include main layout--->
               @switch(Auth::user()->role_id)
               @case(1){{-- SuperAdmin --}}
               @include('includes.admin.dashboard')
                 @break
               @case(2){{-- Landlord --}}
               @include('includes.landlord.dashboard')
                 @break
               @case(3){{-- Tenant --}}               
               @include('includes.tenant.dashboard')
                 @break
              @endswitch

               <!-----incude main layout-->



            </section>
        </div>
@include('includes.footer')

