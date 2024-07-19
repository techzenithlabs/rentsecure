@include('includes.home-header')
@include('layouts.home-navigation')


<div class="container blog mt-5">
    <div class="row">
    <div class="about-line-wrap">

        <div class="line"></div>
        <h2 class="userful-resources">USEFUL RESOURCES FOR</h2>

    </div>


    <h2 class="mb-5 mt-4">Landlords & Property Investors</h2>
    @if(isset($page)&&!empty($page))
    <div class="row mt-5 mb-2">
    @foreach($page as $p)
    @php
      $id=$p->id;

      $title=!empty($p->title)?$p->title:"";
      $getblogimg= !empty($p->image_url)?$p->image_url:"";
      $getblogdesc=!empty($p->content)?$p->content:"";
      $updated_at=!empty($p->updated_at)?$p->updated_at:"";

    @endphp

        <div class="col-md-4 blog-card">
            <a href="{{ url('page/blog/detail/' . $id) }}">
            <div class="card">

                <img src="{{!empty($getblogimg)?asset($getblogimg):"" }}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">{{ !empty($title)?$title:'' }}</h5>
                    <p class="card-text">{{ !empty($getblogdesc)?$getblogdesc:''; }}</p>
                    <p class="card-text"><small class="text-muted">{!! !empty($updated_at)?\Carbon\Carbon::parse($updated_at)->format('F d, Y').' By Admin':'' !!}</small></p>
                </div>
            </div>
        </a>
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
