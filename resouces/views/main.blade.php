<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>أجارك</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{URL::asset('assets/css/main.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
         @include("navbar")
        </div>
        @if(session()->has('publish_success'))
            <div class="alert alert-success">{{session()->get('publish_success')}}</div>
        @endif
        @if(session()->has('update_success'))
            <div class="alert alert-success">{{session()->get('update_success')}}</div>
        @endif
        @if(session()->has('delete_success'))
            <div class="alert alert-success">{{session()->get('delete_success')}}</div>
        @endif
        @if(session()->has('search_faild'))
            <div class="alert alert-success">{{session()->get('search_faild')}}</div>
        @endif
        @if(session()->has('message_success'))
            <div class="alert alert-success">{{session()->get('message_success')}}</div>
        @endif
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">موقع أجارك </h1>
                <p>
                <a href="{{ url('posts') }}" class="btn btn-primary my-2">أبحث عن موقع للإستئجار</a>
                <a href="{{ url('tenants') }}" class="btn btn-secondary my-2">للمساعدة لأشخاص يبحثون عن موقع</a>
                <a href="{{ url('publish') }}" class="btn btn-dark my-2">نشر إعلان لصاحب موقع</a>
                <a href="{{ url('publish_of_tenant') }}" class="btn btn-info my-2">نشر إعلان لشخص يبحث عن موقع</a>
                <a href="{{ url('edit_post') }}" class="btn btn-warning my-2">تعديل أو حذف إعلان</a>
                </p>
            </div>
            </div>
        </section>
        <br>
        <br>
        <div class="footer" id="down_footer">
        @include("footer")
        </div>
    </body>
</html>