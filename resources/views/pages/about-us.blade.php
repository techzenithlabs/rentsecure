@include('includes.home-header')
@include('layouts.home-navigation')

<section class="hero-section text-center py-5">
    <div class="container">
        <div class="row">
        <div class="col-sm-7 col-lg-7">
            <div class="about-line-wrap">

                <div class="line"></div>
                <h2 class="header-title">ABOUT US</h2>

            </div>
        <h1 class="home-story text-start">Your Home Story</h1>
        <p class="text-start mt-2 mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. Lorem Ipsum is not simply random text.</p>
        <p class="text-start mt-3 mb-2">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. Lorem Ipsum is not simply random text.</p>
        <button class="learnmore float-start mt-2">Contact Us</button>
    </div>
    <div class="col-sm-5 col-lg-5">
        <img src="{{ url('/public/assets/images/abouts-us/mask-group.png') }}">
    </div>
    </div>
    </div>
</section>

<section class="stats-section text-center py-5 bg-light">
    <div class="container">
        <h2 class="mb-5">Stat Says It All</h2>
        <div class="row">
            <div class="col-md-4 mb-4">

                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/easysetup.png') }}" alt="Icon 1" height="50">
                </div>
                <h3 class="h5 mt-0">Easy Setup</h3>
                <p>Less time to set up.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/scalable.png') }}" alt="Icon 2" height="50">
                </div>
                <h3 class="h5 mt-0">Scalable</h3>
                <p>Ready to scale with your business.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/top-talent.png') }}" alt="Icon 3" height="50">
                </div>
                <h3 class="h5 mt-0">Top Talent</h3>
                <p>Access to the best talents.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/same-time-zone.png') }}" alt="Icon 4" height="50">
                </div>
                <h3 class="h5 mt-0">Same Time Zone</h3>
                <p>Work in the same time zone.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/solid-infra.png') }}" alt="Icon 5" height="50">
                </div>
                <h3 class="h5 mt-0">Solid Infrastructure</h3>
                <p>Robust infrastructure support.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-icon">
                    <img src="{{ url('/public/assets/images/abouts-us/your-culture.png') }}" alt="Icon 6" height="50">
                    <span class="culture-icon"><img src="{{ url('/public/assets/images/abouts-us/culture-icon.png') }}"></span>
                </div>
                <h3 class="h5 mt-0">Your Culture</h3>
                <p>Align with your company's culture.</p>
            </div>
        </div>
    </div>
</section>
<section class="sustainability-section text-center py-5">
    <div class="container">
        <div class="row">
        <div class="col-sm-7 col-lg-7">
            <img src="{{ url('public/assets/images/abouts-us/goals.png') }}">

        </div>
        <div class="col-sm-5 col-lg-5">
            <div class="mission-wrap">
            <div class="line1"></div>
            <h2 class="header-title1">OUR MISSION</h2>
            <h2 class="mb-4 text-start">Sustainability Goals</h2>
             <p class="text-start">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. Lorem Ipsum is not simply random text.Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. Lorem Ipsum is not simply random text.psum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
            <button class="learnmore float-start">Contact Us</button>
           </div>
        </div>
    </div>
    </div>
</section>
<section class="projects-section py-5">
    <div class="container">
        <div class="prime-wrap">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url('public/assets/images/abouts-us/prime-rental.png') }}" class="card-img-top" alt="Project 1">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Prime Rental <br/>Opportunities</strong></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url('public/assets/images/abouts-us/prime-rental-1.png') }}" class="card-img-top" alt="Project 2">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Prime Rental <br/>Opportunities</strong></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ url('public/assets/images/abouts-us/prime-rental-2.png') }}" class="card-img-top" alt="Project 3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Prime Rental <br/>Opportunities</strong></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="faq-section text-center py-5 bg-light">
    <div class="container">
        <h2 class="mb-5">Frequently Asked Questions</h2>
        <div id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is your return policy?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion" style="">
                    <div class="card-body">
                        Our return policy lasts 30 days...
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How do I track my order?
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion" style="">
                    <div class="card-body">
                        You can track your order using...
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Can I change my shipping address?
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, you can change your shipping...
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('includes.home-footer')
