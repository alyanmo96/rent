<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>أجارك</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{URL::asset('assets/css/app.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets/css/publish.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
         @include("navbar")
        </div>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{URL::asset('assets/img/navbar_logo.png')}}" id="publish_img" width="100" height="100">
            <h2>إنشر إعلان بحثك عن إيجار</h2>
            <p>بعد طلب النشر يتم تزويدك برقم خاص يمكنك من تعديل او حذف منشورك الشخصي</p>
        </div>
        <div class="container">
            <form action="/tenant_share" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row col-sm-12">
                    <div class="sos"> 
                    <select class="form-select" name="area" id="area" required>
                            <option value="">إختر المنطقة</option>
                            <option value="أم طوبا">أم طوبا</option>
                            <option value="بيت حنينا"> بيت حنينا</option>
                            <option value="بيت صفافا">بيت صفافا</option>
                            <option value="بير نبالا"> بير نبالا</option>
                            <option value="الرام"> الرام</option>
                            <option value="سلوان"> سلوان</option>
                            <option value="جبل المكبر">جبل المكبر</option>
                            <option value="شرفات"> شرفات</option>
                            <option value="شعفاط">شعفاط</option>
                            <option value="صور باهر"> صور باهر</option>
                            <option value="الطور">الطور</option>
                            <option value="عناتا">عناتا</option>
                            <option value="العيزرية">العيزرية</option>
                            <option value="العيسوية">العيسوية</option>
                            <option value="قلنديا">قلنديا</option>
                            <option value="كفر عقب"> كفر عقب</option>
                            <option value="الولجة"> الولجة</option>
                            <option value="رأس العامود">رأس العامود</option>
                            <option value="الشيخ جراح">الشيخ جراح</option>
                            <option value="وادي الجوز">وادي الجوز</option>
                            <option value="جبل الزيتون">جبل الزيتون</option>
                            <option value="أم ليسون"> أم ليسون</option>
                        </select> 
                    </div>  
                    <br>
                    <br>                         
                    <div id="description" class="col-sm-12">
                        <label for="description"></label>
                        <textarea id="description_area" rows="4" cols="50" placeholder="أضف وصفاًإضافياً لذلك. يرجى إضافة رقم هاتف للتواصل..." name="description"></textarea>     
                    </div>
                    <button type="submit" value="upload" class="btn btn-success" id="publish_button">إنشر</button>
                </div>
            </form>   
        </div>     
        <br>
        <br>   
        <div class="footer" id="down_footer">
        @include("footer")
        </div>
    </body>
</html>