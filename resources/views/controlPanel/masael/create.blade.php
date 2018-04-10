@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>اضافة سؤال</title>
@endsection

@section("content")
    <div class="ui one column grid">
        <div class="column">
            <div class="ui inverted top attached segment">
                <div class="ui hidden divider"></div>
                <h1 class="ui center aligned header">
                    <span>الاجوبة الميسرة - اضافة سؤال جديد</span>
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

                @if(session("CreateMasaelMessage"))
                    <div class="ui success message">
                        <div class="ui center aligned green header">{{session("CreateMasaelMessage")}}</div>
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                @endif

                <form class="ui large form" method="post" action="/ControlPanel/masael/create/validate">
                    {!! csrf_field() !!}
                    <div class="ten wide field">
                        <label for="question">السؤال</label>
                        <textarea id="question" name="question">{{old("question")}}</textarea>
                    </div>

                    <div class="ten wide field">
                        <label for="answer">الجواب</label>
                        <textarea id="answer" name="answer">{{old("answer")}}</textarea>
                    </div>

                    <button type="submit" class="ui teal button">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection