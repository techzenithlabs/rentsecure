@include('includes.home-header')
@include('layouts.home-navigation')
@php
use Carbon\Carbon;
$created_date=Carbon::parse($blog->created_at);
$formattedDate = $created_date->format('d F Y');

@endphp
<div class="container mt-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <h1>{{ $blog->title }}</h1>
        <p><a href="#">Home</a> / Blog</p>
    </div>

    <!-- First Article Section -->
    <div class="row mb-5">
        <div class="col-md-6">
            <h2>{{ !empty($blog->top_blog_title)?$blog->top_blog_title:"" }}</h2>
             <p class="text-mute">Posted On: <strong>{{ $formattedDate }}</strong> <b>|</b> <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span> </p>
            <p>{{ !empty($blog->top_blog_desc)?$blog->top_blog_desc:"" }}</p>

        </div>
        <div class="col-md-6">
            @if(!empty($blog->top_blog_image))<img style="border-radius:22px 22px 22px 22px" src="{{ asset('storage/app/'.$blog->top_blog_image) }}" class="img-fluid" alt="Article Image 1">@endif
        </div>
    </div>

    <!-- Second Article Section -->
    <div class="container second-section">
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            @if(!empty($blog->bottom_blog_image))<img  class="img-fluid rounded-circle" src="{{ asset('storage/app/'.$blog->bottom_blog_image) }}" alt="Article Image 1">@endif

        </div>
        <div class="col-md-6">
            <div class="articlecontainer">
            <h2>{{ !empty($blog->bottom_blog_title)?$blog->bottom_blog_title:"" }}</h2>
            <p>{{ !empty($blog->bottom_blog_desc)?$blog->bottom_blog_desc:"" }}</p>
            <a href="{{ url('page/contact-us') }}" class="btn btn-primary contactus">Contact Us</a>
          </div>
        </div>
    </div>
    </div>

    <!-- Third Article Section -->
    <div class="row mb-5">
        <div class="col-md-12 col-lg-12 thirdsection">
            <h2 class="text-center">{{ !empty($blog->footer_blog_title)?$blog->footer_blog_title:"" }}</h2>
            <p class="text-center">{{ !empty($blog->footer_blog_desc)?$blog->footer_blog_desc:"" }}</p>
            <center>@if(!empty($blog->footer_blog_image))<img src="{{ asset('storage/app/'.$blog->footer_blog_image) }}" alt="Article Image 1">@endif</center>
        </div>

    </div>

    <!-- Insights Section -->
    <div class="fourthsection">
    <div class="text-center mb-5">
        <h3>Other Insights You May Find Helpful</h3>
    </div>
    <div class="row">

        @if(isset($otherblogs)&&!empty($otherblogs))
        @foreach($otherblogs as $blogs)

        <div class="col-md-3">
            <div class="blogbg">
            <a href="{{ url('page/blog/detail/' . $blogs->id) }}">
            <img class="img-fluid" src="{{ asset($blogs->image_url) }}" alt="Article Image 1"><br/>
            <h6 class="text-left"><strong>{{ $blogs->title }}</strong></h6>
            <p class="text-left" style="color:gray">{{ $blogs->content }}</p>
            </div>
        </a>
        </div>

        @endforeach
       @endif
    </div>
</div>

</div>


@include('includes.home-footer')
