@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>لوحة التحكم</title>
@endsection

@section("content")
    <style>
        i.massive.icon {
            margin-bottom: 12px;
            font-size: 7em !important;
        }
        .three.column,
        .four.column,
        .eight.column {
            margin-bottom: 25px;
        }
    </style>
    <div class="ui segment">
        <div class="ui center aligned grid">
            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="globe brown massive icon"></i>
                <a class="ui fluid teal large button" href="/ControlPanel/news">
                    <span>الأخبار</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="chart pie pink massive icon"></i>
                <a class="ui fluid teal large button" href="/ControlPanel/activity">
                    <span>النشاطات</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="chart bar purple massive icon"></i>
                <a class="ui fluid teal large button" href="/ControlPanel/qcActivity">
                    <span>نشاطات مركز القمر</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="certificate violet massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>التطبيقات</span>
                </a>
            </div>


            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="paste blue massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>الأصدارات</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="question grey massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>الأسئلة الشائعه</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="pencil alternate green massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>الأجوبة الميسرة</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="video olive massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>الأستوديو</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="images yellow massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>البوم الصور</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="th orange massive icon"></i>
                <a class="ui fluid teal large button" href="">
                    <span>الدورت</span>
                </a>
            </div>

            <div class="three wide computer four wide tablet eight wide mobile column">
                <i class="shutdown red massive icon"></i>
                <a class="ui fluid teal large button" href="/ControlPanel/logout">
                    <span>تسجيل خروج</span>
                </a>
            </div>
        </div>
    </div>
@endsection