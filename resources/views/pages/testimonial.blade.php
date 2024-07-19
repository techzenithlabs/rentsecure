@include('includes.home-header')
@include('layouts.home-navigation')


@php


     $testimonial_img=!empty($page->blocks->testimonial_pic)?json_decode($page->blocks->testimonial_pic):[];
     $testimonial_desc=!empty($page->blocks->testimonial_desc)?json_decode($page->blocks->testimonial_desc):[];
     $testimonial_star=!empty($page->blocks->testimonial_star)?json_decode($page->blocks->testimonial_star):[];
     $testimonial_author=!empty($page->blocks->testimonial_author)?json_decode($page->blocks->testimonial_author):[];
     $testimonial_desg=!empty($page->blocks->testimonial_desg)?json_decode($page->blocks->testimonial_desg):[];

@endphp

<div class="container testimonial mt-5">
    <h2 class="text-center mb-2">Testimonials</h2>
    <p class="text-center mb-4">Get In Touch And Let Us Know How We Can Help</p>
    <div class="row">
        @if(isset($testimonial_desc)&&!empty($testimonial_desc))
        @foreach($testimonial_desc as $key=> $val)
        @php
         $testi_img=!empty($testimonial_img)? $testimonial_img[$key]:"";
         $rating=!empty( $testimonial_star)? @$testimonial_star[$key]:[];
         $author=!empty($testimonial_author)?@$testimonial_author[$key]:[];
         $desg=!empty($testimonial_desg)?@$testimonial_desg[$key]:[];


        @endphp
        <div class="col-md-6 mb-4">
            <div class="card testimonial-card">
                <div class="card-body">
                    <p class="card-text">{{ $val }}</p>
                    <div class="d-flex align-items-center">
                        <img src="{{!empty($testi_img)?asset('storage/app/'.$testi_img):"" }}" class="rounded-circle mr-3" width="60" height="60" alt="Hotel Image">

                        <div>
                            <h5 class="mb-0">{{ !empty($author)?$author:'' }}</h5>
                            <p class="text-muted mb-0">{{ !empty($desg)?$desg:'' }}</p>
                            @if(isset($rating)&&!empty($rating))
                            <p class="mb-0"><span class="text-warning">
                            @for($i=0;$i<(int)$rating;$i++)
                            ★
                            @endfor
                           </span></p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
         @endif



    </div>

    <!-- Pagination -->
    <nav style="display:none" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</div>

@include('includes.home-footer')
