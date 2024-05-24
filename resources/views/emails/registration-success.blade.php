@include('includes.home-header')
<style>
.container{

    background:aliceblue;
    min-height:640px
}
.mailcontent{
    padding-top:80px;
}

    a.btn.btn-primary {
    border-radius: 22px 22px 22px 22px;
    background: #0e57c3;
    font-size: 0.9em;
    }
</style>
<div class="container">

<div class="row">
    <center class="mt-4"><img src="{{ asset('public/assets/images/logo.png') }}"/></center>
    <div class="mailcontent col-sm-12 col-lg-12 text-center mt-4">

        <h2 class="mt-4">Congratulations!  <strong>{{ $firstname }}</strong></h2>
        <p class="text-success font-bold">You have successfully registered. Kindly check your email for confirmation.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Back To Login</a>
    </div>
</div>
</div>
@include('includes.home-footer')
