<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield("title")

    {{--Font--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    {{--StyleSheet--}}
    <link href="{{asset("css/semantic.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/animate.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/styleCp.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/snackbar.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/quill.snow.css")}}" rel="stylesheet" type="text/css">

    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    {{--Script--}}
    <script src="{{asset("js/semantic.min.js")}}"></script>
    <script src="{{asset("js/snackbar.js")}}"></script>
    <script src="{{asset("js/quill.js")}}"></script>
</head>

<body>
<div class="ui right vertical inverted sidebar labeled icon menu" style="direction: ltr;">
    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>

    <a class="item" href="/ControlPanel/news">
        <i class="globe brown icon"></i>
        <span>الأخبار</span>
    </a>

    <a class="item" href="/ControlPanel/activities">
        <i class="chart pie pink icon"></i>
        <span>النشاطات</span>
    </a>


    <a class="item" href="/ControlPanel/qcActivities">
        <i class="chart bar purple icon"></i>
        <span>نشاطات مركز القمر</span>
    </a>

    <a class="item" href="/ControlPanel/applications">
        <i class="certificate violet icon"></i>
        <span>التطبيقات</span>
    </a>

    <a class="item" href="/ControlPanel/releases">
        <i class="paste blue icon"></i>
        <span>الأصدارات</span>
    </a>

    <a class="item" href="">
        <i class="question grey icon"></i>
        <span>الأسئلة الشائعه</span>
    </a>

    <a class="item" href="">
        <i class="pencil alternate green icon"></i>
        <span>الأجوبة الميسرة</span>
    </a>

    <a class="item" href="">
        <i class="video olive icon"></i>
        <span>الأستوديو</span>
    </a>

    <a class="item" href="">
        <i class="images yellow icon"></i>
        <span>البوم الصور</span>
    </a>

    <a class="item" href="">
        <i class="th orange icon"></i>
        <span>الدورت</span>
    </a>

    <a class="item" href="/ControlPanel/logout">
        <i class="shutdown red icon"></i>
        <span>تسجيل خروج</span>
    </a>
</div>

<div class="pusher">
    <div class="ui fixed inverted menu">
        <div class="ui container">
            <div class="item">
                <h1 class="ui large inverted right aligned header">لوحة التحكم - تراث الأنبياء(ع)</h1>
            </div>
            <a class="left item" onclick="$('.ui.sidebar').sidebar('toggle');">
                <div class="ui inverted icon button">
                    <i class="sidebar icon"></i>
                </div>
            </a>
        </div>
    </div>
    <div class="ui container" style="margin-top: 60px;">
        @yield("content")
    </div>

    @yield("extra-content")
</div>
@yield("script")
</body>
</html>
