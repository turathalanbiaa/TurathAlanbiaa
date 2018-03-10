@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة نشاط</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>النشاطات - اضافة نشاط جديد</span>
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

                @if(session("CreateActivityMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateActivityMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/activity/create/validate" enctype="multipart/form-data">
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
                        <label for="image">الصورة الرئيسية للنشاط</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <div class="ten wide field">
                        <label for="images">صور أخرى حول النشاط</label>
                        <input type="file" name="images[]" id="images" multiple>
                    </div>

                    <div class="ten wide field">
                        <label for="videoLink">رابط فديو خاجي</label>
                        <input type="text" name="videoLink" id="videoLink" value="{{old("videoLink")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="externalLink">رابط مصدر خارجي</label>
                        <input type="text" name="externalLink" id="externalLink" value="{{old("externalLink")}}">
                    </div>

                    <button type="submit" class="ui teal button">ارسال</button>
                </form>
            </div>
        </div>
    </div>

@endsection