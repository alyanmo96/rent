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
        <form action="/admin_edit_specific_post" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach($post as $i)
                    <button type="submit" value="{{$i->post_id}}" name="action">
                        <div class="col">
                        <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 fw-normal">
                            @if($i->build_type==1)
                                مسكن
                                @else
                                موقع تجاري
                            @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">
                            @if($i->area==1)
                            أم طوبا
                            @elseif($i->area==2)
                            بيت حنينا
                            @elseif($i->area==3)
                            بيت صفافا
                            @elseif($i->area==4)

                            @elseif($i->area==5)

                            @elseif($i->area==6)

                            @endif
                            </h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>تم النشر بواسطة: {{$i->name}}</li>
                                <li>رقم هاتف: {{$i->phone}}</li>
                                @if($i->build_type==1)
                                    @if($i->parking=="yes")
                                        <li>يشمل موقف سيارات</li>
                                    @else
                                        <li>لايشمل موقف سيارات</li>    
                                    @endif
                                    <li>عدد الغرف: {{$i->rooms}}</li>
                                @endif
                            <li>{{$i->description}}</li>
                            <li>تاريخ النشر: {{$i->updated_at}}</li>
                            </ul>
                        </div>
                        </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </form>
    </body>
</html>