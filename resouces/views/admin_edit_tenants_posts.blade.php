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
        <form action="/admin_edit_specific_tenant_post" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                @foreach($post as $i)
                    <button type="submit" value="{{$i->post_id}}" name="action">
                        <div class="col">
                        <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4">
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