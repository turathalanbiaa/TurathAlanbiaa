@extends("layout.layout")

@section("title")
    <title>التطبيقات</title>
@endsection

@section("content")
    @include("layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui applications grid">
            @foreach($applications as $application)
                <div class="sixteen wide mobile eight wide tablet eight wide computer column">
                    <div class="ui application fluid card">
                        <div class="content">
                            <div class="app logo">
                                <img class="ui circular image" src="{{asset("/img/tur.png")}}">
                            </div>

                            <div class="app description">
                                <p class="title">{{$application->title}}</p>
                                <p class="detail">{{$application->content}}{{$application->content}}</p>
                            </div>
                        </div>

                        <div class="footer">
                            <div class="text">
                                <p>التطبيق متوفر الآن على</p>
                            </div>

                            <div class="app buttons">
                                <div class="info button">
                                    <a href="/application?id={{$application->id}}"><i class="info icon"></i></a>
                                </div>

                                <div class="google play button">
                                    <a href=""><i class="google play icon"></i></a>
                                </div>

                                <div class="apple store button">
                                    <a href=""><i class="apple store icon"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section("script")
    <script>
        $(window).ready(function () {
            var w = window.innerWidth;
        });
        $('.ui.dropdown').dropdown({
            transition: 'fade up'
        });
        $(document).ready(function () {
            var pagination = $(".pagination");
            pagination.removeClass("pagination").addClass("ui right aligned pagination olive menu");
            // $('.pagination').addClass('ui right aligned pagination olive menu');
            pagination.css({'padding':'0','font-size':'12px'});
            pagination.find('li').addClass('item');
        });
    </script>
@endsection