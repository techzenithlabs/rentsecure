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


                    <div class="container">
                    <form name="admin_screening" action="{{ route('cms') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                     <div class="row">
                        <div class="col-sm-6">

                         <div class="form-group">
                            <label>Title</label>
                        <input class="form-control" type="text" name="title" >

                        </div>
                      </div>
                      <div class="col-sm-6">
                      </div>


                      <div class="col-sm-8 mt-4">
                        <div class="form-group">

                            <label>Description</label>
                            <textarea style="height:300px" class="form-control" name="description" rows="10" cols="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group mt-4">
                        <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </div>

                     </div>
                    </form>

                    </div>


                </div>

                </div>



            </section>
        </div>
@include('includes.footer')
