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
                    <li class="p-2 text-dark"><a class="nav-link" href="{{ url('ajark_admin_it_man') }}">العودة لصفحة الإدارة <span class="sr-only"></span></a></li>

                    <li class="p-2 text-dark"><a class="nav-link" href="{{ url('admin_edit_posts') }}">العودة لصفحة أصحاب العقارات <span class="sr-only"></span></a></li>
                </ul>
            </div>
        </div> 
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <form action="/admin_update_post" method="post" enctype="multipart/form-data">
        @csrf
            @foreach($post as $i)
            <div class="card-header">
                    <h4 class="my-0 fw-normal">
                <div class="col">
                    <input type="text" class="form-control top_inputs" placeholder="{{$i->phone}}" aria-label="phone" name="phone">
                </div>
                    </h4>
                    <h4 class="my-0 fw-normal">
                <div id="description">
                    <label for="description"></label>
                    <textarea id="description_area" rows="4" cols="50" placeholder="{{$i->description}}" name="description"></textarea>     
                </div>
                    </h4>
                    <input hidden name="post_num" value="{{$i->post_id}}">
                <button type="submit" name="action" value="upload" class="btn btn-success">حفظ التغيرات</button>
                <button type="submit" name="action" value="delete" class="btn btn-danger">حذف المنشور</button>
                </div>
            @endforeach
        <form>
        </div>
    </body>
</html>