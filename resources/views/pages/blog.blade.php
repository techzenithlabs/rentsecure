@include('includes.home-header')
@include('layouts.home-navigation')


<div class="container blog mt-5">
    <div class="row">
    <div class="about-line-wrap">

        <div class="line"></div>
        <h2 class="userful-resources">USEFUL RESOURCES FOR</h2>

    </div>

    @php

     $blog_title=json_decode($page->blocks->blog_title);
     $blog_img=!empty($page->blocks->blog_img)?json_decode($page->blocks->blog_img):[];
     $blog_desc=json_decode($page->blocks->blog_desc);
     $blog_date=$page->blocks->updated_at;

    @endphp


    <h2 class="mb-5 mt-4">Landlords & Property Investors</h2>
    @if(isset($blog_title)&&!empty($blog_title))
    <div class="row mt-5 mb-2">
    @foreach($blog_title as $key => $val)
    @php
      $getblogimg= !empty($blog_img)?$blog_img[$key]:[];
      $getblogdesc=$blog_desc[$key];
    @endphp

        <div class="col-md-4 blog-card">
            <div class="card">

                <img src="{{!empty($getblogimg)?asset('storage/app/'.$getblogimg):"" }}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">{{ !empty($val)?$val:'' }}</h5>
                    <p class="card-text">{{ !empty($getblogdesc)?$getblogdesc:''; }}</p>
                    <p class="card-text"><small class="text-muted">November 12, 2023 by Admin</small></p>
                </div>
            </div>
        </div>

        <!-- Repeat the above three columns to simulate more blog posts -->

    @endforeach
</div>
    @endif



    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>
</div>
</div>
@include('includes.home-footer')
