@include('includes.header')
<style>
     .faqform {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
     .remove-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 0.9em;
            margin-top: 10px;
            float:right;
        }
</style>

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


                            <label>Title</label>  @if($pages->page_name=="Blog")
                            <a href="{{ route('posts.index') }}" style="transform:translate(4px, -25px)" class="btn btn-primary float-end">Edit Blocks</a>
                            @else
                            <button type="button" style="transform:translate(4px, -25px)" data-toggle="modal" data-target="#openblock" class="btn btn-primary float-end">Edit Blocks</button>
                            @endif

                        <input class="form-control" type="text" name="title" value="{{ !empty($pages->page_name)?$pages->page_name:"" }}" >
                        @if($pages->page_name=="About Us")
                        <div style="display:inline-flex;margin-top:20px">
                            <input type="hidden" name="homefile" value="{{ !empty($pages->blocks->home_story)?$pages->blocks->home_story:'' }}">
                            <input class="form-control" type="file" name="home_story" id="home_story">  <img width="50px" src="{{!empty($pages->blocks->home_story)?asset('storage/app/'.$pages->blocks->home_story):"" }}" alt="File">
                        </div>
                        @endif

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
                        @if($page_slug=="testimonial")
                        <button onclick="clonetestimonial(event)" style="transform: translate(0px, 0px);" class="btn btn-primary float-end">Add More</button>
                        @endif
                        <form name="save_cmsblocks" id="save_cmsblock" action="{{ route('save-cms.blocks') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pages->id }}">
                            <input type="hidden" name="pagename" value="{{ $page_slug }}">
                        @if($page_slug=="about-us")
                        <div class="row">

                            <div class="col-md-12">
                                <label>Upload Mission File</label><br/>
                                <input type="hidden" name="uploadmissionfile" value="{{ !empty($pages->blocks->our_mission_image)?$pages->blocks->our_mission_image:'' }}">
                                <div class="flex">

                                <input class="form-control" type="file" name="mission_file" id="mission_file">  @if(!empty($pages->blocks->our_mission_image))<img width="40" src="{{ asset('storage/app/'.$pages->blocks->our_mission_image) }}"/>@endif<br/><br/>
                               </div>
                                <label>Our Mission</label><br/>
                                <textarea name="our_mission" rows="5" cols="50" id="our_mission" value="{{ !empty($pages->blocks->our_mission)?$pages->blocks->our_mission:""  }}">{{ !empty($pages->blocks->our_mission)?$pages->blocks->our_mission:""  }}</textarea>
                                <hr/><br/>
                                <h5><strong>FAQ</strong></h5><br/>
                                        <button type="button" id="add-more-faq" class="btn btn-primary float-right mb-4">Add More</button>
                                        @if(!empty($pages->blocks->faq_title))
                                        @php
                                         $getfaq=json_decode($pages->blocks->faq_title);
                                         $getdesc=json_decode($pages->blocks->faq_desc);

                                        @endphp
                                         <div id="faq-form-container">
                                        @foreach($getfaq as $key=>$faq)
                                        <div class="faqform mt-4 mb-4">
                                            <label>Enter Faq Title</label>
                                            <input type="text" name="faqtitle[]" value="{{ $faq }}" class="form-control"/><br/>
                                            <label>Enter Faq Desc</label>
                                            <textarea name="faqdesc[]" rows="5" cols="50" value="{{ $getdesc[$key] }}">{{ $getdesc[$key] }}</textarea>
                                           </div>

                                        @endforeach
                                      </div>

                                        @else
                                        <div id="faq-form-container">
                                        <div class="faqform mt-4 mb-4">
                                        <label>Enter Title</label>
                                        <input type="text" name="faqtitle[]" class="form-control"/><br/>
                                        <label>Enter Desc</label>
                                        <textarea name="faqdesc[]" rows="5" cols="50"></textarea>
                                       </div>
                                        </div>
                                       @endif



                            </div>
                        </div>

                        @endif

                        @if($page_slug=="blog")

                        @php
                         $titles=json_decode($pages->blocks->blog_title);
                         $img=!empty($pages->blocks->blog_img)?json_decode($pages->blocks->blog_img):[];
                         $desc=json_decode($pages->blocks->blog_desc);

                        @endphp
                        <div class="row">
                         @if(!empty($titles))
                         @foreach($titles as $key=>$val)
                         @php
                          $imgs= !empty($img)?$img[$key]:[];
                          $bogdesc=$desc[$key];
                         @endphp

                        <div class="col-md-12 mt-2 mb-2">
                            <input class="form-control" type="text" placeholder="Enter Title" value="{{ !empty($val)?$val:'' }}" name="title[]" id="title1"><br/>
                            <div style="display:inline-flex">
                            <input class="form_control" type="file" name="blogimg[]" value="{{ !empty($imgs)?$imgs:''}}">  <img width="50px" src="{{!empty($imgs)?asset('storage/app/'.$imgs):"" }}" alt="File"><br/>
                            </div>
                            <textarea class="mt-2" name="blogdesc[]" rows="5" cols="53"  value="{{ !empty($bogdesc)?$bogdesc:""  }}">{{ !empty($bogdesc)?$bogdesc:""  }}</textarea>

                        </div>
                        <hr/>
                        @endforeach
                        @endif



                        </div>


                        @endif

                        @if($page_slug=="testimonial")
                        <div class="row">
                            <div id="testimonials-container">
                        @php
                            $testimonial_img=!empty($pages->blocks->testimonial_pic)?json_decode($pages->blocks->testimonial_pic):[];
                            $testimonial_desc=!empty($pages->blocks->testimonial_desc)?json_decode($pages->blocks->testimonial_desc):[];
                            $testimonial_star=!empty($pages->blocks->testimonial_star)?json_decode($pages->blocks->testimonial_star):[];
                            $testimonial_author=!empty($pages->blocks->testimonial_author)?json_decode($pages->blocks->testimonial_author):[];
                            $testimonial_desg=!empty($pages->blocks->testimonial_desg)?json_decode($pages->blocks->testimonial_desg):[];


                          @endphp
                          @if(isset($testimonial_desc)&&!empty($testimonial_desc))
                          @foreach($testimonial_desc as $key =>$val)
                          @php
                          $testi_img = !empty($testimonial_img[$key]) ? $testimonial_img[$key] : "";
                            $rating = !empty($testimonial_star[$key]) ? (int)$testimonial_star[$key] : 0;
                            $author = !empty($testimonial_author[$key]) ? $testimonial_author[$key] : "";
                            $desg = !empty($testimonial_desg[$key]) ? $testimonial_desg[$key] : "";


                         @endphp
                          <div id="testimonials" class="testimonials col-sm-12 col-md-12 mt-5 mb-5">
                            <div id="removebtn"></div>
                           <label>Upload Pic</label><br/>
                           <div class="flex">
                           <input type="hidden" name="testipics[]" value="{{ !empty($testi_img)?$testi_img:"" }}">
                          <input class="form-control" type="file" name="testimonial_pic[]" >  <img src="{{!empty($testi_img)?asset('storage/app/'.$testi_img):"" }}" class="rounded-circle mr-3" width="60" height="60" alt="Hotel Image"><br/>
                        </div>
                          <label>Enter Description</label><br/>
                          <textarea class="mt-2" name="testimonial_desc[]" rows="5" cols="53"  value="{{ !empty($val)?$val:""  }}">{{ !empty($val)?$val:""  }}</textarea>
                          <div class="flex">

                            <label><input type="radio" name="testimonial_star[{{$key}}]" {!! (int)$rating==1?'checked':'' !!} value="1"> 1 Star </label>
                            <label><input type="radio" name="testimonial_star[{{$key}}]" {!! (int)$rating==2?'checked':'' !!} value="2"> 2 Star </label>
                            <label><input type="radio" name="testimonial_star[{{$key}}]" {!! (int)$rating==3?'checked':'' !!} value="3"> 3 Star </label>
                            <label><input type="radio" name="testimonial_star[{{$key}}]" {!! (int)$rating==4?'checked':'' !!} value="4"> 4 Star </label>
                            <label><input type="radio" name="testimonial_star[{{$key}}]" {!! (int)$rating==5?'checked':'' !!} value="5"> 5 Star </label>
                          </div>
                          <label>Author</label>
                          <input class="form-control" type="text" name="testimonial_author[]" value="{{ !empty($author)?$author:'' }}">
                          <label>Designation</label>
                          <input class="form-control" type="text" name="testimonial_desg[]" value="{{ !empty($desg)?$desg:'' }}">
                        </div>

                          @endforeach

                          @else

                            <div id="testimonials" class="testimonials col-sm-12 col-md-12 mt-5 mb-5">
                                <div id="removebtn"></div>
                               <label>Upload Pic</label><br/>
                              <input class="form-control" type="file" name="testimonial_pic[]" ><br/>
                              <label>Enter Description</label><br/>
                              <textarea class="mt-2" name="testimonial_desc[]" rows="5" cols="53"  value="{{ !empty($bogdesc)?$bogdesc:""  }}">{{ !empty($bogdesc)?$bogdesc:""  }}</textarea>
                              <div class="flex">
                                <label><input type="radio" name="testimonial_star[]" value="1"> 1 Star </label>
                                <label><input type="radio" name="testimonial_star[]" value="2"> 2 Star </label>
                                <label><input type="radio" name="testimonial_star[]" value="3"> 3 Star </label>
                                <label><input type="radio" name="testimonial_star[]" value="4"> 4 Star </label>
                                <label><input type="radio" name="testimonial_star[]" value="5"> 5 Star </label>
                              </div>
                              <label>Author</label>
                              <input class="form-control" type="text" name="testimonial_author[]">
                              <label>Designation</label>
                              <input class="form-control" type="text" name="testimonial_desg[]">
                            </div>
                        @endif
                    </div>
                   </div>


                        @endif


                        @if($page_slug=="contact-us")
                        @php
                        $mobile_usa=!empty($pages->blocks->mobile_usa)?$pages->blocks->mobile_usa:"";
                        $mobile_uk=!empty($pages->blocks->mobile_uk)?$pages->blocks->mobile_uk:"";
                        $contact_email=!empty($pages->blocks->contact_email)?$pages->blocks->contact_email:"";

                        @endphp
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <label>Enter Mobile No(USA)</label><br/>
                              <input class="form-control" type="text" name="mobile_no_usa" value="{{ !empty($mobile_usa)?$mobile_usa:"" }}"><br/>
                              <label>Enter Mobile No(UK)</label><br/>
                              <input class="form-control" type="text" name="mobile_no_uk" value="{{ !empty($mobile_uk)?$mobile_uk:"" }}"><br/>
                              <label>Enter Email</label><br/>
                              <input class="form-control" type="email" name="contact_email" value="{{ !empty($contact_email)?$contact_email:"" }}"><br/>
                            </div>
                        </div>

                        @endif
                    </div>
                        <div class="modal-footer">
                            <div style="display:none" class="savedmessage alert alert-success"></div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>



                </div>
            </div>
        </div>
    </div>
@include('includes.footer')
<script>
    document.getElementById('add-more-faq').addEventListener('click', function() {
        const faqForm = document.querySelector('.faqform');
            const clonedForm = faqForm.cloneNode(true);

            // Create and add a Remove button to the cloned form
            const removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.className = 'remove-btn';

            removeButton.addEventListener('click', function() {
                clonedForm.remove();
            });
            clonedForm.appendChild(removeButton);

            // Append the cloned form to the container
            document.getElementById('faq-form-container').appendChild(clonedForm);
        });
</script>
