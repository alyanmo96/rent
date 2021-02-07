<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>أجارك</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
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

        @if(session()->has('delete_success'))
            <div class="alert alert-success">{{session()->get('delete_success')}}</div>
        @endif
 
            <div class="row col-sm-12 row-cols-md-3 mb-3 text-center">
                @foreach($rent_post as $i)
                    @if($i->showToAdmin=='no')
                    <div class="col">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                            @if($i->build_type==1)
                                <h4 class="my-0 fw-normal" style="background-color:#aeacac;">                            
                                    مسكن
                                    @else
                                <h4 class="my-0 fw-normal" style="background-color:#c6a5a5;">
                                    موقع تجاري
                                @endif
                                </h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>المنطقة: {{$i->area}}</li>
                                    <li>تم النشر بواسطة: {{$i->name}}</li>
                                    <li>رقم هاتف: {{$i->phone}}</li>
                                    @if($i->build_type==1&&($i->rooms==1||$i->rooms==2))
                                        <li>عدد الغرف: {{$i->rooms}}</li>
                                    @endif
                                @if(strlen($i->description)>70)
                                    <li>{{$small = substr($i->description, 0, 110)}}...</li>
                                    <li><button onclick="Function('{{$i->description}}')"class="btn btn-secondary"> لتفاصيل إضافية »</button></li>
                                @else
                                    <li>{{$i->description}}</li>
                                @endif
                                <li>تاريخ النشر: {{$i->updated_at}}</li>
                                <li>رقم المنشور: {{$i->post_id}}</li>
                                <li>
                                    <div class="btn-group">
                                        <a href="{{url('/admin_delete_post_as_new/'.$i->post_id)}}" class="btn btn-sm btn-outline-danger">حذف المنشور من قائمة المنشورات الحديثة</a>
                                    </div>
                                </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @foreach($tenant as $i)
                    @if($i->showToAdmin=='no')
                    <div class="col">
                    <h4 class="my-0 fw-normal" style="background-color:#ffeb00;">                            
                                    باحث عن                                   
                                </h4>
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>المنطقة: {{$i->area}}</li>
                                @if(strlen($i->description)>70)
                                    <li>{{$small = substr($i->description, 0, 110)}}...</li>
                                    <li><button onclick="Function('{{$i->description}}')"class="btn btn-secondary"> لتفاصيل إضافية »</button></li>
                                @else
                                    <li>{{$i->description}}</li>
                                @endif
                                <li>تاريخ النشر: {{$i->updated_at}}</li>
                                <li>رقم المنشور: {{$i->post_id}}</li>
                                <li>
                                    <div class="btn-group">
                                        <a href="{{url('/admin_delete_post_as_new/'.$i->post_id)}}" class="btn btn-sm btn-outline-danger">حذف المنشور من قائمة المنشورات الحديثة</a>
                                    </div>
                                </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
                 
        <div id="myModal" class="modal">
            <div class="modal-content" style="width: 90%;">
                <span class="close">&times;</span>
                <p id="modle_description"></p>
            </div>
        </div>
    <div class="footer">
     @include("pop_up_modle_script")
    </div> 
    </body>
</html>