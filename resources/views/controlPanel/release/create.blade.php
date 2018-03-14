@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة اصدار</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>الاصدارات - اضافة اصدار جديد</span>
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

                @if(session("CreateReleaseMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateReleaseMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/release/create/validate" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="ten wide field">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" id="title" value="{{old("title")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="detail">التفاصيل</label>
                        <textarea name="detail" id="detail" rows="15">{{old("detail")}}</textarea>
                    </div>

                    <div class="ten wide field">
                        <label for="date">التأريخ</label>
                        <input type="date" name="date" id="date" value="{{old("date")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="image">الصورة الرئيسية للاصدار (Logo)</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <div class="ten wide field">
                        <label for="file">ملف الكتاب (pdf-word)</label>
                        <input type="file" name="file" id="file">
                    </div>

                    <div class="ten wide field">
                        <label for="videoLink">رابط اعلاني حول هذا الأصدار</label>
                        <input type="text" name="videoLink" id="videoLink" value="{{old("videoLink")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="externalLink">رابط الكتاب على مكتبتنا</label>
                        <input type="text" name="externalLink" id="externalLink" value="{{old("externalLink")}}">
                    </div>

                    <button type="submit" class="ui teal button">ارسال</button>
                </form>
            </div>
        </div>
    </div>

@endsection