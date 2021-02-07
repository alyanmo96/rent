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
        <br>
        <h1>تعديل أو حذف منشور رقم: {{$post[0]['post_id']}}</h1>
        <br>
        <p>هنا يتم تعديل رقم الهاتف أو التفاصيل المضافة. إن كنت ترغب بتعديل أية تفاصيل أخرى يمكنك التواصل مع طاقم الموقع</p>
        <div class="text-center">
        <form action="/update_post" method="post" enctype="multipart/form-data">
        @csrf
            @foreach($post as $i)
            <div class="card-header">
                <h4 class="my-0 fw-normal">
                    <div class="col">
                        <input type="text" class="form-control top_inputs" placeholder="{{$i->phone}}" aria-label="phone" name="phone" style="width:50%;">
                    </div>
                </h4>
                <br>
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
        <div class="footer" id="down_footer">
        @include("footer")
        </div>
    </body>
</html>