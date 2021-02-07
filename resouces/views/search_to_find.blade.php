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
            @include("navbar")
        </div>    
        <br>
        <h1>ساعد الأخرين بالبحث عن موقع للإستئجار</h1>

        @if(session()->has('search_faild'))
            <div class="alert alert-success">{{session()->get('search_faild')}}</div>
        @endif

        @if(!empty($no_search_input))
        <div class="alert alert-success"> {{ $no_search_input }}</div>
        @endif
        
        <form class="py-5 text-center" action="/search_to_find" method="post" enctype="multipart/form-data">
        @csrf   
            <div class="container">
                <div class="row col-sm-12">
                    <div class="col-sm-8">
                        <select class="form-select" name="area" id="area">
                            <option value="">إختر المنطقة</option>
                            <option value="الشيخ جراح">الشيخ جراح</option>
                            <option value="الرام"> الرام</option>
                            <option value="الطور">الطور</option>
                            <option value="العيزرية">العيزرية</option>
                            <option value="العيسوية">العيسوية</option>
                            <option value="الولجة"> الولجة</option>
                            <option value="أم طوبا">أم طوبا</option>
                            <option value="أم ليسون"> أم ليسون</option>
                            <option value="بيت حنينا"> بيت حنينا</option>
                            <option value="بيت صفافا">بيت صفافا</option>
                            <option value="بير نبالا"> بير نبالا</option>
                            <option value="جبل الزيتون">جبل الزيتون</option>
                            <option value="جبل المكبر">جبل المكبر</option>                        
                            <option value="سلوان"> سلوان</option>
                            <option value="شرفات"> شرفات</option>
                            <option value="شعفاط">شعفاط</option>
                            <option value="رأس العامود">رأس العامود</option>
                            <option value="صور باهر"> صور باهر</option>
                            <option value="عناتا">عناتا</option>
                            <option value="قلنديا">قلنديا</option>
                            <option value="كفر عقب"> كفر عقب</option>                        
                            <option value="وادي الجوز">وادي الجوز</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="col-sm-4">
                    <button type="submit" value="search" class="btn btn-success" id="publish_button">بحث</button>
                </div>
            </div>    
        </form>

        <div class="row col-sm-12 row-cols-md-3 mb-3 text-center">
            @foreach($post as $i)
                <div class="col-sm-4">
                    <div class="card tenants_cards mb-4">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>البلدة: {{$i->area}}</li>
                            @if(strlen($i->description)>70)
                                <li>{{$small = substr($i->description, 0, 110)}}...</li>
                                <li><button onclick="Function('{{$i->description}}')"class="btn btn-secondary"> لتفاصيل إضافية »</button></li>
                            @else
                                <li>{{$i->description}}</li>
                            @endif
                            <li>تاريخ النشر: {{$i->updated_at}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
     
        <div id="myModal" class="modal">
            <div class="modal-content" style="width: 90%;">
                <span class="close">&times;</span>
                <p id="modle_description"></p>
            </div>
        </div>

        <div class="footer" id="down_footer">
            @include("footer")
        </div>

    <div class="footer">
     @include("pop_up_modle_script")
    </div> 
    </body>
</html>