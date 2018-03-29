@extends("website.layout.layout")

@section("title")
    <title>الادراة</title>
@endsection

@section("content")
    @include("website.layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui management grid">
            <div class="sixteen wide column">
                <div class="ui right aligned inverted header">
                    <span>للتواصل مع الادارة</span>
                </div>
                <div class="ui right aligned inverted header">
                    <span>1- </span>
                    <span>للتواصل مع المعهد على التليغرام</span>
                    <br><br>
                    <span> اضغط على الرابط</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://t.me/turathmanage"><em>https://t.me/turathmanage</em></a>
                </div>

                <div class="ui hidden divider"></div>

                <div class="ui right aligned inverted header">
                    <span>2- </span>
                    <span>قناة الاعلانات على التيليغرام</span>
                    <span> - </span>
                    <span>تنشر الاخبار الخاصة بطلبة معهد تراث الانبياء للدراسات الحوزوية الالكترونية</span>
                    <br><br>
                    <span>رابط القناة</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://t.me/joinchat/AAAAAFMkTQCyVXyhVtAa1Q"><em>https://t.me/joinchat/AAAAAFMkTQCyVXyhVtAa1Q</em></a>
                </div>

                <div class="ui hidden divider"></div>

                <div class="ui right aligned inverted header">
                    <span>3- </span>
                    <span>كروب الادراة</span>
                    <span> - </span>
                    <span>القسم الرجالي</span>
                    <br><br>
                    <span>رابط الكروب</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://t.me/joinchat/DUCqiA7zQd8lubIhZ6i-pw  "><em>https://t.me/joinchat/DUCqiA7zQd8lubIhZ6i-pw  </em></a>
                </div>
            </div>
        </div>

        @include("website.layout.footer")
    </div>
@endsection