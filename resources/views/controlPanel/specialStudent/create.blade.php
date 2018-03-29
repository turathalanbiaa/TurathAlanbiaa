@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة طالب</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>الطلاب المتميزون - اضافة طالب جديد</span>
                </h1>
                <div class="ui hidden divider"></div>
            </div>

            <div class="ui attached segment">

                @if(count($errors))
                    <div class="ui error fadeInUp animated message" style="padding: 14px 0;">
                        <ul style="text-align: right; direction: rtl;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session("CreateSpecialStudentMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateSpecialStudentMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/special-student/create/validate">
                    {!! csrf_field() !!}
                    <div class="ten wide field">
                        <label for="name">اسم الطالب</label>
                        <input type="text" name="name" id="name" value="{{old("name")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="star">التقييم</label>
                        <input type="number" name="star" id="star" value="{{old("star")}}" placeholder="التقييم من 5">
                    </div>

                    <div class="ten wide field">
                        <label for="month">الشهر</label>
                        <input type="number" name="month" id="month" value="{{old("month")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="year">السنة</label>
                        <input type="number" name="year" id="year" value="2018">
                    </div>

                    <button type="submit" class="ui teal button">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection