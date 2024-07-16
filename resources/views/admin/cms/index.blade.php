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


                    <div class="table-responsive">
                        <a href="{{ route('cms.add') }}" class="btn btn-primary float-end">Add Page</a>
                     @php
                        $filePath = config('app.url').'/storage/app/';
                     @endphp
                        @if(isset($pages)&&!empty($pages))
                          <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Page</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $index=>$page)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $page->page_name }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->description }}</td>
                                    <td><a class="btn btn-primary" href="{{route('cms.edit')}}/{{ $page->id }}">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="">Delete</a></td>
                                </tr>

                                @endforeach




                            </tbody>
                        </table>
                        @else
                        <div class="mt-5">
                          <h4 class="text text-danger text-center">Sorry No Data Found</h4>
                        </div>
                        @endif

                    </div>


                </div>

                </div>



            </section>
        </div>
@include('includes.footer')

