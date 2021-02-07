<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>أجارك</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{URL::asset('assets/css/contact.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            @include("navbar")
        </div>
        <div class="container">  
            <form id="contact" action="/send_message" method="post" enctype="multipart/form-data">
                @csrf
                <h4>اترك لنا التفاصيل الخاصة بك من أجل الاتصال بك</h4>
                <fieldset>
                    <input class="contact_input" placeholder="اسم" name="name" type="text" tabindex="1" autofocus>
                </fieldset>
                <fieldset>
                    <input class="contact_input" placeholder="Email" type="email" name="email" tabindex="2">
                </fieldset>
                <fieldset>
                    <input class="contact_input" placeholder="رقم الهاتف" type="tel" tabindex="3" name="phone" required>
                </fieldset>
                <fieldset>
                    <textarea class="contact_input" placeholder="اكتب....." tabindex="5" name="message" required></textarea>
                </fieldset>
                <fieldset>
                    <button class="contact_input" name="submit" type="submit" data-submit="...Sending">ابعث</button>
                </fieldset>
            </form>
        </div>
    </body>
</html>