@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة فديو</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>الاستوديو - اضافة فديو جديد</span>
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

                @if(session("CreateVideoMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateVideoMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/video/create/validate">
                    {!! csrf_field() !!}
                    <div class="ten wide field">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" id="title" value="{{old("title")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="videoLink">YouTube Video ID</label>
                        <input type="text" name="videoLink" id="videoLink" value="{{old("videoLink")}}">
                    </div>

                    <div class="ten wide field">
                        <label for="date">التأريخ</label>
                        <input type="date" name="date" id="date" value="{{old("date")}}">
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