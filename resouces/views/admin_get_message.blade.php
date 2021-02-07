<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{URL::asset('assets/css/admin_message.css')}}" rel="stylesheet" type="text/css">
        <title> أجارك</title>
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>  
            <a class="navbar-brand" href="/" id="main_title"> أجارك</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="p-2 text-dark"><a class="nav-link" href="{{ url('home') }}">العودة لصفحة الإدارة الرئيسية <span class="sr-only"></span></a></li>
                    <li class="p-2 text-dark"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        الخروج
                                    </a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </ul>
            </div>
        </div>  
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h2>רשימת הודעות</h2>
                    <div class="list_of_messages">
                        @foreach($message as $i)
                            <div class="main" id="section1"> 
                                <button type="button" class="btn btn-warning" onclick="Function('{{$i->id}}','{{$i->name}}','{{$i->message}}','{{$i->phone}}','{{$i->email}}','{{$i->created_at}}')">{{$i->name}}</button>      
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-9" id="show_message_subject" style="display: none;">
                    <h1 id="message_sender_name"></h1>
                    <p id="message_sender_email"></p> 
                    <p id="message_sender_phone"></p>
                    <p id="message_sender_subject"></p>
                    <p id="message_sender_sent"></p>
                    <br>           
                    <form method="post">
                        <a id="admin_delete_message" class="btn btn-sm btn-outline-danger">מחיקה</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>


<script>
function Function(message_id_number,name,message,phone,email,time){
    document.getElementById("show_message_subject").style.display ='block';
    document.getElementById("message_sender_name").innerHTML = name;
    document.getElementById("message_sender_email").innerHTML = email;
    document.getElementById("message_sender_phone").innerHTML = phone;
    document.getElementById("message_sender_subject").innerHTML = message;
    document.getElementById("message_sender_sent").innerHTML = time;
    var str1 = "/delete_message/";
    var str2 = message_id_number;
    var res = str1.concat(str2);
    document.getElementById("delete_message").href =res;
}
window.onscroll = function() {myFunction()};
function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
//document.getElementById("myBar").style.width = scrolled + "%";
}
</script>