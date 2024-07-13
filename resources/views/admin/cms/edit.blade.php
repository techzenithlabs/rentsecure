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
                    <form name="admin_screening" action="{{ route('cms.edit') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                     <div class="row">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" value="{{ !empty($pages->id)?$pages->id:"" }}" >

                         <div class="form-group">

                            <label>Title</label> <button type="button" data-toggle="modal" data-target="#openblock"  style="transform:translate(4px, -25px)" class="btn btn-primary float-end">Edit Blocks</button>

                        <input class="form-control" type="text" name="title" value="{{ !empty($pages->page_name)?$pages->page_name:"" }}" >

                        </div>
                      </div>
                      <div class="col-sm-6">
                      </div>


                      <div class="col-sm-8 mt-4">
                        <div class="form-group">

                            <label>Description</label>
                            <textarea style="height:300px" class="form-control" name="description" rows="10" cols="5" value="{{!empty($pages->description)?$pages->description:"" }}">{{!empty($pages->description)?$pages->description:"" }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group mt-4">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                        </div>
                    </div>

                     </div>
                    </form>

                    </div>


                </div>

                </div>



            </section>
        </div>

         <!-- Modal -->
         <div class="modal fade" id="openblock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="">
                           @php
                           $page_slug=$pages->slug;
                           $title=match($page_slug) {
                            'about-us' => 'Edit About Us Section' ,
                            'blog' => 'Edit Blog Section',
                            'services'=>'Edit Services Section',
                            'testimonial'=>'Edit Testimonial Section',
                            'contact-us'=>'Edit Contact Us Section',
                            'pricings'=>'Edit Pricings Section',
                             default =>'Edit '.ucwords($page_slug),
                           };
                           @endphp
                           {{ $title }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="save_cmsblocks" id="save_cmsblock" action="{{ route('save-cms.blocks') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pages->id }}">
                            <input type="hidden" name="pagename" value="{{ $page_slug }}">
                        @if($page_slug=="about-us")



                        <div class="row">
                            <div class="col-md-12">
                                <label>Home Story</label><br/>
                                <input type="file" name="home_story" id="home_story">

                            </div>

                            <div class="col-md-12">
                                <label>Our Mission</label>
                                <textarea name="our_mission" rows="5" cols="50"id="our_mission" value="{{ !empty($pages->blocks->our_mission)?$pages->blocks->our_mission:""  }}">{{ !empty($pages->blocks->our_mission)?$pages->blocks->our_mission:""  }}</textarea>
                            </div>
                        </div>

                        @endif

                        @if($page_slug=="blog")

                        @endif

                        @if($page_slug=="testimonial")

                        @endif

                        @if($page_slug=="contact-us")

                        @endif
                        <div class="modal-footer">
                            <div style="display:none" class="savedmessage alert alert-success"></div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
