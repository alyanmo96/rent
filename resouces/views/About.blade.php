<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>أجارك</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="{{URL::asset('assets/css/about.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
         @include("navbar")
        </div>
        <br>
        <br>
            <h1 class="fw-light">موقع أجارك</h1>
            <p id="about_about">في الأونة الأخيرة قد صادفنا العديد من إعلانات الإيجار عبر منصات التواصل الإجتماعي. منها إعلان للبحث ومنها إعلان لنشر مسكن أو موقع تجاري يملكه شخص معين يريد أن يأجره لطرف أخر. وبهذا قد تحولت العديد من صفحات الأخبار (على منصة الفيس بوك بالأخص) التابعة لبلدات عربية في القدس إلى نشر إعلانات الناس. وبذلك يتم تبادل المعلومات بين الطرفين . وهناك كان لابد منا كمبرمجين خادمين لمجتمعنا مساعدة الأهل بأي طريقة. وكانت بإنشاء موقع يجمع إعلانات أصحاب العقارات ليقوموا بنشر مايريدون إيجاره, ومن طرف أخر يقوم من يبحث عن موقع (سكني/تجاري) بنشر بأنه يبحث عن ما يلزمه. وبذلك تكون منصة مفتوحه للطرفين بالمجان في مكان واحد.</p>
        <br>
        <p>تم تبسيط الموقع قدر المستطاع, وذلك ليتمكن الجميع من إستخدامه بسهولة تامة.</p>
        <br>
        <p>لكل ملاحظة حول الموقع نتمنى منكم إبلاغنا بها لكي نتمكن من التصحيح .</p>
        <br>
        <br>         
        <div class="footer" id="down_footer">
        @include("footer")
        </div>   
    </body>
</html>
