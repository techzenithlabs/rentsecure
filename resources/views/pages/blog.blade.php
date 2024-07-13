@include('includes.home-header')
@include('layouts.home-navigation')


<div class="container blog mt-5">
    <div class="row">
    <div class="about-line-wrap">

        <div class="line"></div>
        <h2 class="userful-resources">USEFUL RESOURCES FOR</h2>

    </div>
    <h2 class="mb-5 mt-4">Landlords & Property Investors</h2>
    <div class="row">
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog1.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">10 Things All Rooms Should Have</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 12, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog2.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">Best Days to Book Hotel for Tour</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 13, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog3.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">Choose Any Place to Travel</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 14, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <!-- Repeat the above three columns to simulate more blog posts -->
    </div>

    <div class="row mt-5">
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog1.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">10 Things All Rooms Should Have</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 12, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog2.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">Best Days to Book Hotel for Tour</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 13, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 blog-card">
            <div class="card">
                <img src="{{url('/public/assets/images/blog/blog3.png')}}" class="card-img-top" alt="Hotel Image">
                <div class="card-body">
                    <h5 class="card-title">Choose Any Place to Travel</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt arcu vel arcu fermentum, eget placerat sem finibus.</p>
                    <p class="card-text"><small class="text-muted">November 14, 2023 by Admin</small></p>
                </div>
            </div>
        </div>
        <!-- Repeat the above three columns to simulate more blog posts -->
    </div>

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
