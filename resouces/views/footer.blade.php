<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link href="{{URL::asset('assets/css/footer.css')}}" rel="stylesheet" type="text/css">    
    </head>
    <body>
      <footer class="site-footer">
          <div class="container">
            <div class="row">
              <div class="col-xs-6 col-md-6">
                <ul class="footer-links">
                  <li>ajark.site@gmail.com</li>
                  <li>للتواصل عبر الواتس أب على الرقم التالي</li>
                </ul>
              </div>
              <div class="col-xs-6 col-md-6">
                <ul class="footer-links">
                @if (\Request::is('about')) 
                  <li style="display:none;"><button class="btn btn-light"><a href="{{ url('about') }}">عن الموقع</a></button></li>
                @else
                  <li><button class="btn btn-light"><a href="{{ url('about') }}">عن الموقع</a></button></li>
                @endif
                @if (\Request::is('contact')) 
                  <li style="display:none;"><button class="btn btn-light" style="margin-top:2%;"><a href="{{ url('contact') }}">تواصل معنا</a></button></li>
                @else
                  <li><button class="btn btn-light" style="margin-top:2%;"><a href="{{ url('contact') }}">تواصل معنا</a></button></li>
                @endif                
                  <li><a><p class="copyright-text"> &copy; 2021 جميع الحقوق محفوظة لموقع 
            <a href="#">أجارك</a>
                </p></a></li>
                </ul>
              </div>
            </div>
            <hr>
          </div>
    </footer>
    </body>
</html>