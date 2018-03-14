@extends("website.layout.layout")

@section("title")
    <title>الأخبار</title>
@endsection

@section("content")
    @include("website.layout.navbar")
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
                                        <i class="ui calendar alternate olive icon"></i>
                                        <span>{{$news->date}}</span>
                                    </div>
                                </h2>

                                @if(!is_null($news->videoLink))
                                    <div class="ui embed" data-url="{{$news->videoLink}}" data-placeholder="{{asset("/storage/" . $news->Images[0]->image)}}"></div>
                                    <div class="ui divider"></div>
                                @endif

                                <div class="ui medium left floated image" id="news-image">
                                    <a class="ui left corner label" onclick="$('.ui.modal').modal('show');">
                                        <i class="zoom black icon"></i>
                                    </a>
                                    <img src="{{asset("/storage/" . $news->Images[0]->image)}}">
                                </div>

                                <?php $lines = explode(".",$news->content); ?>
                                @foreach($lines as $line)
                                    <p class="line">{{$line}}</p>
                                @endforeach

                                @if(!is_null($news->externalLink))
                                    <p class="ui olive header">
                                        <span>روابط أخرى حول هذا الخبر - </span>
                                        <a href="{{$news->externalLink}}">
                                            <span> أضغط هنا </span>
                                        </a>
                                    </p>
                                @endif
                            </div>

                            <!-- news albums -->
                            @if(count($news->Images) > 1)
                                <div class="column">
                                    @include("website.news.albums")
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="sixteen wide mobile five wide tablet five wide computer column">
                        <div class="ui medium inverted header">
                            <span>آخر الأخبار</span>
                        </div>

                        <div class="ui link news pointing list">
                            @foreach($allNews as $singleNews)
                                <a class="item" href="/news?id={{$singleNews->id}}">
                                    {{$singleNews->title}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                @include("website.layout.footer")
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="ui modal">
        <i class="close icon"></i>
        <img class="ui fluid thumbnail image" src="{{asset("/storage/" . $news->Images[0]->image)}}">
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