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
            <h2>إنشر إعلانك للإيجار</h2>
            <p>بعد طلب النشر يتم تزويدك برقم خاص يمكنك من تعديل او حذف منشورك الشخصي</p>
        </div>
        <form class="py-5 text-center form_inputs" action="/user_share" method="post" enctype="multipart/form-data">
        @csrf
            <div class="container">
                <div class="row col-sm-12">
                    <div class="col-sm-6">
                        <input type="text" class="form-control top_inputs" placeholder="الإسم" aria-label="name" name="name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control top_inputs" placeholder="رقم الهاتف" aria-label="phone" name="phone" required>
                    </div>
                </div>
                <br>
                <div class="row col-sm-12">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                        <select class="form-select" aria-label="rent" onchange="rent_type(this);" name="build_type">
                            <option value="1" selected>نوع المبنى</option>
                            <option value="1">مسكن</option>
                            <option value="2">محل تجاري</option>
                        </select>
                    </div>
                </div>
                <br>
            </div> 
            <div class="row col-sm-12">
                <div class="col" id="Parking">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="parking1" value="yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                             يشمل موقف للسيارات
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="parking2" value="no" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            لا يشمل موقف للسيارات
                        </label>
                    </div>             
                </div>
                <div class="col"> 
                    <div id="Rooms_counter">
                        <select class="form-select" aria-label="rooms" name="rooms">
                            <option selected>عدد الغرف</option>
                            <option value="1">غرفة</option>
                            <option value="2">غرفتان</option>
                            <option value="2"> ثلاث غرف</option>
                            <option value="2">اربع غرف</option>
                            <option value="2">اكثر من اربع غرف</option>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div id="description">
                    <label for="description"></label>
                    <textarea id="description_area" rows="4" cols="50" placeholder="أضف وصفاًإضافياً لذلك..." name="description"></textarea>     
                </div>
                <br>
                <button type="submit" value="upload" class="btn btn-success" id="publish_button">إنشر</button>
            </div>

        </form>        
        <div class="footer" id="down_footer">
        @include("footer")
        </div>
    </body>
</html>
<script>
function rent_type(that) {
    if (that.value == "1") {
        document.getElementById("Parking").style.display = "block";
        document.getElementById("Rooms_counter").style.display = "block";
    } else {
        document.getElementById("Parking").style.display = "none";
        document.getElementById("Rooms_counter").style.display = "none";
    }
}
</script>