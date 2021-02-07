<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>أجارك</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{URL::asset('assets/css/user_edit_post.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
         @include("navbar")
        </div>
        @if(session()->has('edit_redirect_failed'))
            <div class="alert alert-success">{{session()->get('edit_redirect_failed')}}</div>
        @endif
        <main class="form-signin">
            <form action="/user_edit_post" method="post" enctype="multipart/form-data">
                @csrf
                <img class="mb-4" src="{{URL::asset('assets/img/navbar_logo.png')}}" id="edit_img">
                <label for="post_num" class="visually-hidden"></label>
                <input type="text" name="post_num" class="form-control" style="width:50%" placeholder="رقم المنشور الخاص بك">
                <br>
                <button class="w-50 btn btn-lg btn-primary" type="submit"> الإنتقال إلى تعديل المنشور</button>
                <br><br>
                <a class="w-50 btn btn-outline-primary" href="{{ url('contact') }}"> لا أتذكر رقم المنشور الخاص بي <span class="sr-only"></span></a>
            </form>
        </main>
        <br><br><br><br>
        <div class="footer" id="down_footer">
        @include("footer")
        </div>
    </body>
</html>