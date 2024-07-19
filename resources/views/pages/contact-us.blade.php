@include('includes.home-header')
@include('layouts.home-navigation')

@php

 $mobile_usa=!empty($page->blocks->mobile_usa)?$page->blocks->mobile_usa:"";
 $mobile_uk=!empty($page->blocks->mobile_uk)?$page->blocks->mobile_uk:"";
 $contact_email=!empty($page->blocks->contact_email)?$page->blocks->contact_email:"";
@endphp

<div class="container">
    <div class="contact-header">
        <h1>Contact <span style="color: #000;"><b style="font-weight:800">Us</b></span></h1>
        <p>Lorem Ipsum Is Simply Dummy Text Of The Printing And Typesetting Industry.</p>
    </div>

    <div class="contact-info">
        <div>
            <i class="fas fa-phone"></i>
            <h5>Call Us</h5>
            <p>USA: {!!!empty($mobile_usa)?'+1 '.$mobile_usa:'N/A' !!}<br>UK: {!!!empty($mobile_uk)?'+44 '.$mobile_uk:'N/A' !!}</p>
        </div>
        <div>
            <i class="fas fa-envelope"></i>
            <h5>Email</h5>
            <p>info@entsecure.com</p>
        </div>
    </div>

    <div class="contact-form">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
        </div>
        <div class="contactform">
        <form>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="First Name*">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Last Name*">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" placeholder="Business Email">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Company Name">
                </div>
            </div>
            <div class="form-group">
                <input type="text" style="height:60px" class="form-control" placeholder="Job Title">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@include('includes.home-footer')
