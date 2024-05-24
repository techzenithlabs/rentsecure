@include('includes.home-header')
@include('layouts.home-navigation')

<section class="banner-sec">
    <div class="container">
      <div class="banner-overlay">
        <h1>go far beyond the standard FICO scores and credit reports</h1>
        <p>We provide unparalleled service</p>
        <ul>
          <li>Lorem Ipsum is simply dummy text of the printing</li>
          <li>when an unknown printer took a galley of type</li>
          <li>It was popularised in the 1960s</li>
        </ul>
        <a href="#">Learn More</a>
      </div>
    </div>
    <div class="bannerimg">
        <img class="img-fluid" src="{{ asset('public/assets/images/banner-01.jpg') }}">
      </div>
  </section>
  <section class="homesec-02">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="video-sec">
            <img class="img-fluid" src="{{ asset('public/assets/images/home-img02.png') }}">
            <a href="#">
              <img src="{{ asset('public/assets/images/video-icon.png')}}">
            </a>
          </div>
        </div>
        <div class="col-md-7">
          <h2 class="sec-hedding">Problem/Solution</h2>
          <h3><span>Talk about the main pain point</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </h3>
          <p><em>Lorem Ipsum has been the industry's</em> standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          <p><em>Contrary to popular belief,</em> Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia. Lorem Ipsum is not simply random text.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="homesec-03">
    <div class="container benefits-sec">
      <h2 class="sec-hedding">Benefits of Our Services</h2>
      <ul>
        <li>
          <picture>
            <img class="img-fluid" src="{{ asset('public/assets/images/lock-icon.png') }}">
          </picture>
          <h4>Service 1</h4>
          <p>Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#">Explore More</a>
        </li>
        <li>
          <picture>
            <img class="img-fluid" src="{{ asset('public/assets/images/lock-icon.png') }}">
          </picture>
          <h4>Service 1</h4>
          <p>Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#">Explore More</a>
        </li>
        <li>
          <picture>
            <img class="img-fluid" src="{{ asset('public/assets/images/lock-icon.png') }}">
          </picture>
          <h4>Service 1</h4>
          <p>Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#">Explore More</a>
        </li>
        <li>
          <picture>
            <img class="img-fluid" src="{{ asset('public/assets/images/lock-icon.png') }}">
          </picture>
          <h4>Service 1</h4>
          <p>Lorem Ipsum is simply dummy text of the printing.</p>
          <a href="#">Explore More</a>
        </li>
      </ul>
    </div>
  </section>
  <section class="homesec-04">
      <div class="container values-sec">
          <div class="row">
              <div class="col-md-5 values-lft">
                  <picture>
                      <img class="img-fluid" src="{{ asset('public/assets/images/home-img03.png') }}">
                  </picture>
              </div>
              <div class="col-md-7 values-rgt">
                  <h2 class="sec-hedding">The Values We brings</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                  <ul>
                      <li><p>15 Years of<span> Experience</span><p></li>
                      <li><p>Risk Management and<span> Quality Professional</span><span> Background</span><p></li>
                      <li><p>Meetup with <span>Professionals</span><p></li>
                      <li><p>Building <span>communities</span><p></li>
                  </ul>
              </div>
          </div>
      </div>
  </section>

  <section class="homesec-05">
      <div class="container">
          <div class="aboutsay-sec">
              <h2 class="sec-hedding">What People say about us</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
              <ul class="owl-carousel owl-theme about-carousel">
                  <li>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                      <picture>
                          <img class="img-fluid" src="{{ asset('public/assets/images/henery.png') }}">
                      </picture>
                      <span class="ratting">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                      </span>
                      <h6>Hanry Stevens <span>Customer</span></h6>
                  </li>
                  <li>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                      <picture>
                          <img class="img-fluid" src="{{ asset('public/assets/images/jasica.png') }}">
                      </picture>
                      <span class="ratting">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                      </span>
                      <h6>Jasica James <span>Customer</span></h6>
                  </li>
                  <li>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                      <picture>
                          <img class="img-fluid" src="{{ asset('public/assets/images/jasica.png') }}">
                      </picture>
                      <span class="ratting">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                      </span>
                      <h6>Jasica James <span>Customer</span></h6>
                  </li>
              </ul>
          </div>
      </div>
  </section>

  <section class="homesec-06">
      <div class="container buyNow-sec">
          <h2 class="sec-hedding">What Sets apart from the competition</h2>
          <div class="buynow-offer">
              <div class="offer-list">
                  <div class="offer-head">
                      <h3>Other</h3>
                      <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                  </div>
                  <ul>
                      <li>Aliquam tincidunt mauris eu.</li>
                      <li>Vestibulum auctor dapibus.</li>
                      <li>Nunc dignissim risus id metus.</li>
                      <li>Cras ornare tristique elit.</li>
                      <li>Praesent placerat risus quis</li>
                      <li>Vestibulum auctor dapibus.</li>
                      <li>Nunc dignissim risus id metus.</li>
                      <li>Cras ornare tristique elit.</li>
                      <li>Praesent placerat risus quis</li>
                  </ul>

              </div>
              <div class="offer-list">
                  <div class="offer-head">
                      <h3>Other</h3>
                      <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                  </div>
                  <ul>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                  </ul>
                  <a href="#">Buy Now</a>
              </div>
              <div class="offer-list">
                  <div class="offer-head">
                      <h3>Other</h3>
                      <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                  </div>
                  <ul>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                  </ul>
                  <a href="#">Buy Now</a>
              </div>
              <div class="offer-list">
                  <div class="offer-head">
                      <h3>Other</h3>
                      <img class="img-fluid" src="{{ asset('public/assets/images/logo.png') }}">
                  </div>
                  <ul>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                      <li><i class="bi bi-three-dots"></i></li>
                      <li><i class="bi bi-check-lg"></i></li>
                  </ul>
                  <a href="#">Buy Now</a>
              </div>
          </div>
      </div>
  </section>

  <section class="homesec-07">
      <div class="container pros-sec">
          <div class="row">
              <div class="col-md-7 pros-cont">
                  <h2 class="sec-hedding">the Process for Landlord</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                  <ul>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>01</span></li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>02</span></li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>03</span></li>
                  </ul>
                  <div class="how-work">
                      <label class="alignRight">See how it works</label>
                  </div>
                  <div class="arrow-img">
                      <img class="img-fluid" src="{{ asset('public/assets/images/pros-arrow-rgt.png') }}">
                  </div>
              </div>
              <div class="col-md-5 pros-img paddingLeft">
                  <picture>
                      <img class="img-fluid" src="{{ asset('public/assets/images/home-img04.png') }}">
                      <a href="#"> <img class="img-fluid" src="{{ asset('public/assets/images/video-play.png') }}"> </a>
                  </picture>
              </div>
          </div>
      </div>
  </section>

  <section class="homesec-08">
      <div class="container pros-sec">
          <div class="row">
              <div class="col-md-5 pros-img paddingRight">
                  <picture>
                    <img class="img-fluid" src="{{ asset('public/assets/images/home-img04.png') }}">
                    <a href="#"> <img class="img-fluid" src="{{ asset('public/assets/images/video-play.png') }}"> </a>
                  </picture>
              </div>
              <div class="col-md-7 pros-cont">
                  <h2 class="sec-hedding">the Process for Tenant</h2>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                  <ul>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>01</span></li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>02</span></li>
                      <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry <span>03</span></li>
                  </ul>
                  <div class="how-work textLeft">
                      <label class="alignRleft">See how it works</label>
                  </div>
                  <div class="arrow-img arrowLeft">
                      <img class="img-fluid" src="{{ asset('public/assets/images/pros-arrow-lft.png') }}">
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="homesec-09">
      <div class="container course-sec">
          <div class="row">
              <div class="col-md-6">
                  <div class="mini-course">
                      <h4>Free 5 Days Mini-Course</h4>
                      <picture>
                          <img class="img-fluid" src="{{ asset('public/assets/images/homeimg-05.png') }}">
                      </picture>
                      <h2>How to Guarantee Website ROI</h2>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything.</p>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="video-course">
                      <h3>Get the FREE video course!</h3>
                      <p>Just tell us where you want us to send your first video</p>
                      <form>
                        <div class="form-group">
                              <input type="name" class="form-control" placeholder="First Name">
                          </div>
                          <div class="form-group">
                          <input id="emailHelp"  class="form-control" placeholder="Your Email">
                        </div>
                        <button type="submit" class="btn">Send Me The First Video</button>
                        <span>We promise to keep your email address safe</span>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="homesec-10">
      <div class="container questions-sec">
          <h2 class="sec-hedding">Frequently Asked Questions</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
          <div class="ques-accordian">
              <div class="row">
                  <div class="col-md-6">
                      <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                             Lorem ipsum dolor sit amet, consectetuer adipiscing elit?
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Lorem ipsum dolor sit amet, consectetuer adipiscing elit?
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                              Praesent dapibus neque id cursus faucibus tortor neque?
                            </button>
                          </h2>
                          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapseThree">
                              Nam dui mi tincidunt quis accumsan porttitor facilisis?
                            </button>
                          </h2>
                          <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingfive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapseThree">
                              Donec consectetuer ligula vulputate sem tristique cursus?
                            </button>
                          </h2>
                          <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseOne">
                              Pellentesque odio nisi euismod in pharetra a ultricies in diam?
                            </button>
                          </h2>
                          <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapseTwo">
                              Nam dui mi tincidunt quis accumsan porttitor facilisis?
                            </button>
                          </h2>
                          <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapseThree">
                              Nam dui mi tincidunt quis accumsan porttitor facilisis?
                            </button>
                          </h2>
                          <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapseThree">
                              Donec consectetuer ligula vulputate sem tristique cursus?
                            </button>
                          </h2>
                          <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapseThree">
                              Praesent dapibus neque id cursus faucibus tortor neque?
                            </button>
                          </h2>
                          <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample2">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
              <a href="#"> View More</a>
          </div>
      </div>
  </section>

  <section class="homesec-11">
      <div class="container map-bg">
          <div class="homecont-form">
              <h2 class="sec-hedding">Contact Us</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
              <form>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="Name" class="form-control" placeholder="First Name*">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="last Name" class="form-control" placeholder="Last Name*">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="Email" class="form-control" placeholder="Business Email">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input type="Company Name" class="form-control bi bi-plus-lg" placeholder="Company Name">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <textarea class="form-control" placeholder="hiii"  id="exampleFormControlTextarea1" rows="5"> </textarea>
                          </div>
                      </div>
                  </div>

                <button type="submit" class="btn submit-btn">submit</button>
              </form>
          </div>
      </div>
  </section>

@include('includes.home-footer')
