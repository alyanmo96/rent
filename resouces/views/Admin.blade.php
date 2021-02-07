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
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">إدارة موقع أجارك </h1>
                    <br>
                    <p>
                        <a href="{{ url('admin_check_new_posts') }}" class="btn btn-danger my-2">المنشورات الحديثة</a>
                        <br>
                        <a href="{{ url('admin_edit_posts') }}" class="btn btn-primary my-2">تعديل أو حذف منشور لأصحاب العقارات</a>
                        <br>
                        <a href="{{ url('admin_edit_tenant_posts') }}" class="btn btn-warning my-2">تعديل أو حذف منشور للباحثين عن عقار</a>
                        <br>
                        <a href="{{ url('admin_get_message') }}" class="btn btn-secondary my-2">البريد الوارد</a>
                    </p>
                </div>
            </div>
        </section>
    </body>
</html>