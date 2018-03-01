@extends("layout.layout")

@section("title")
    <title>الأخبار</title>
@endsection

@section("content")
    @include("layout.navbar")
    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column all-news grid">
            <div class="column">
                <div class="ui divided grid">
                    <div class="sixteen wide mobile eleven wide tablet eleven wide computer column">
                        <div class="ui one column grid">
                            <!-- news details -->
                            <div class="column">
                                <h2 class="ui right aligned inverted dividing header">
                                    <span>{{$news->title}}</span>
                                    <div class="sub header">
                                        <i class="ui calendar olive icon"></i>
                                        <span>{{$news->date}}</span>
                                    </div>
                                </h2>

                                @if(!is_null($news->videoLink))
                                    <div class="ui embed" data-url="{{$news->videoLink}}" data-placeholder="{{asset("/img/news1.png")}}" data-icon="ui play video icon"></div>
                                    <div class="ui divider"></div>
                                @endif

                                <div class="ui medium left floated image" id="news-image">
                                    <a class="ui left corner label" onclick="$('.ui.modal').modal('show');">
                                        <i class="zoom black icon"></i>
                                    </a>
                                    <img src="{{asset("/img/news1.png")}}">
                                </div>

                                <?php $lines = explode(".",$news->content); ?>
                                @foreach($lines as $line)
                                    <p class="line">{{$line}}</p>
                                @endforeach
                            </div>

                            <!-- news albums -->
                            <div class="column">
                                @include("news.albums")
                            </div>
                        </div>
                    </div>

                    <div class="sixteen wide mobile five wide tablet five wide computer column">
                        <div class="ui medium inverted header">
                            <span>آخر الأخبار</span>

                            <div class="ui divider"></div>

                            <div class="ui sub header">
                                <span> الصفحات من </span>
                                <span>1</span>
                                <span> الى </span>
                                <span>{{$allNews->lastPage()}}</span>

                                <a class="page" href="/all-news?page=1"><i class="angle right icon"></i></a>
                                <a class="page" href="/all-news?page=2"><i class="angle double left icon"></i></a>
                                <a class="page" href="/all-news?page={{$allNews->lastPage()}}"><i class="angle treble left icon icon"></i></a>
                            </div>
                        </div>

                        <div class="ui divider"></div>

                        <div class="ui link news pointing list">
                            @foreach($allNews as $news)
                                <a class="item" href="/news?id={{$news->id}}">
                                    {{$news->title}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                @include("layout.footer")
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="ui modal">
        <i class="close icon"></i>
        <img class="ui fluid thumbnail image" src="{{asset("/img/news1.png")}}">
    </div>
@endsection

@section("script")
    <script>
        $(window).ready(function () {
            var w = window.innerWidth;

            if (w<992)
                $("#news-image").removeClass("medium").addClass("small");
        });
        $(".ui.dropdown").dropdown({
            transition: 'fade up'
        });
        $('.ui.embed').embed();
    </script>
@endsection