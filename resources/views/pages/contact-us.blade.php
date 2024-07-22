@include('includes.home-header')
@include('layouts.home-navigation')

@php

 $mobile_usa=!empty($page->blocks->mobile_usa)?$page->blocks->mobile_usa:"";
 $mobile_uk=!empty($page->blocks->mobile_uk)?$page->blocks->mobile_uk:"";
 $contact_email=!empty($page->blocks->contact_email)?$page->blocks->contact_email:"";

@endphp



<div class="container">

    <div class="contact-header">
        <h1>Contact <span style="color: #000;"><strong style="font-weight:bolder">Us</strong></span></h1>
        <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</p>
    </div>

    <div class="contact-info">
        <div>
            <i class="fas fa-phone"></i>
            <center><img width="40" src="{{ asset('public/assets/images/icons/phone-icon.png') }}"/></center><br/>
            <h5>Call Us</h5>
            <p>USA: {!!!empty($mobile_usa)?'+1 '.$mobile_usa:'N/A' !!}<br>UK: {!!!empty($mobile_uk)?'+44 '.$mobile_uk:'N/A' !!}</p>
        </div>
        <div>
            <i class="fas fa-envelope"></i>
            <center><img width="40" src="{{ asset('public/assets/images/icons/email-icon.png') }}"/></center><br/>
            <h5>Email</h5>
            <p>info@entsecure.com</p>
        </div>
    </div>

    
    <div style="background-color:#f5f5f5 !important" class="container map-bg">
          <div class="homecont-form">
              <h2 class="sec-hedding">Contact Us</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
              <p id="successMessage" class="success-message">Form submitted successfully!</p>
              <form id="contactForm" method="post" action="">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input name="firstName" required="true" type="Name" class="form-control" placeholder="First Name*">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input required="true" type="last Name" class="form-control" placeholder="Last Name*">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input required="true" type="Email" class="form-control" placeholder="Business Email">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <input required="true" type="Company Name" class="form-control bi bi-plus-lg" placeholder="Company Name">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                   

                    <textarea class="form-control" id="message" placeholder="Job Title" rows="7" required></textarea>
                        <div class="invalid-feedback">Please provide a message.</div>
                          </div>
                      </div>
                  </div>

                <button type="submit" class="btn submit-btn">submit</button>
              </form>
          </div>
      </div>
      <style>
        .success-message {
            display: none;
            color: green;
            margin-top: 10px;
        }
    </style>
    
</div>
@include('includes.home-footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way

        // Display the success message
        successMessage.style.display = 'block';

        // Optionally, clear the form fields
        form.reset();
    });
});

    </script>