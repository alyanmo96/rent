<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="{{URL::asset('assets/css/navbar.css')}}" rel="stylesheet" type="text/css">
  </head>
  <body>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>  
          <a class="navbar-brand" href="/" id="main_title">
          <img src="{{URL::asset('assets/img/navbar_logo.png')}}" id="navbar_logo">
          أجارك</a>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @if (\Request::is('home') || \Request::is('main')  || \Request::is('/')   || \Request::is('HOME')   || \Request::is('MAIN') ) 
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('/') }}" style="display: none;"> الصفحة الرئيسية <span class="sr-only"></span></a></li>
            @else
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('/') }}"> الصفحة الرئيسية <span class="sr-only"></span></a></li>
            @endif

            @if (\Request::is('contact')) 
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('contact') }}" style="display: none;"> تواصل معنا <span class="sr-only"></span></a></li>
            @else
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('contact') }}"> تواصل معنا <span class="sr-only"></span></a></li>

            @endif

            @if (\Request::is('about')) 
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('about') }}" style="display: none;"> عن الموقع  <span class="sr-only"></span></a></li>
            @else
              <li class="p-2 text-dark"><a class="btn btn-outline-primary" href="{{ url('about') }}"> عن الموقع  <span class="sr-only"></span></a></li>
            @endif

            </ul>
          </div>
          <div>
            <!-- Facebook -->
            <a href="http://www.facebook.com/sharer.php?u=" target="_blank">
              إنشر الموقع على منصة الفيس بوك
                <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook"  class="share_it"/>
            </a>  
          </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  </body>
</html>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>