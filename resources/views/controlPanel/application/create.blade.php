@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة تطبيق</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>التطبيقات - اضافة تطبيق جديد</span>
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

                @if(session("CreateApplicationMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateApplicationMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/application/create/validate" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="ten wide field">
                        <label for="title">اسم التطبيق</label>
                        <input type="text" name="title" id="title" value="{{old("title")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="image">الصورة الرئيسية للتطبيق (Logo)</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <div class="ten wide field">
                        <label for="date">التأريخ</label>
                        <input type="date" name="date" id="date" value="{{old("date")}}">
                    </div>

                    <div class="ten wide field" style="text-align: left;">
                        <label for="detail" style="text-align: right;">التفاصيل</label>
                        <div id="detail" style="height: 500px; padding: 14px; overflow-y: scroll;"></div>
                        <input type="hidden" name="detail">
                    </div>

                    <div class="ten wide field">
                        <label for="googlePlayLink">رابط التطبيق على Google Play</label>
                        <input type="text" name="googlePlayLink" id="googlePlayLink" value="{{old("googlePlayLink")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="appleStoreLink">رابط التطبيق على Apple Store</label>
                        <input type="text" name="appleStoreLink" id="appleStoreLink" value="{{old("appleStoreLink")}}">
                    </div>


                    <div class="ten wide field">
                        <label for="images">صور أخرى حول التطبيق</label>
                        <input type="file" name="images[]" id="images" multiple>
                    </div>

                    <div class="ten wide field">
                        <label for="videoLink">رابط الفديو حول استخدام التطبيق </label>
                        <input type="text" name="videoLink" id="videoLink" value="{{old("videoLink")}}">
                    </div>

                    <button type="submit" class="ui teal button" id="send">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        var quill = new Quill('#detail', {
            theme: 'snow'
        });

        quill.format('align', 'right');

        $('#send').click(function () {
            $("input[type='hidden'][name='detail']").val($('#detail').html());
        });
    </script>
@endsection