@extends("website.layout.layout")

@section("title")
    <title>التطبيقات</title>
@endsection

@section("content")
    @include("website.layout.navbar")

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
                                <img class="ui circular image" src="{{asset("/storage/" . $application->Images[0]->image)}}">
                            </div>

                            <div class="app description">
                                <p class="title">{{$application->title}}</p>
                                <p class="detail">{{$application->content}}</p>
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

                                <?php
                                    $links = explode("<>", $application->externalLink);
                                    $googlePlayLink = $links[0];
                                    $appleStoreLink = $links[1];

                                if ($googlePlayLink == "notFound")
                                    $googlePlayLink = "https://play.google.com/store/apps/developer?id=turath.alanbiaa&hl=ar";

                                if ($appleStoreLink == "notFound")
                                    $appleStoreLink = "https://itunes.apple.com/us/developer/ali-faris-abed/id1150792622?mt=8";
                                ?>

                                <div class="google play button">
                                    <a href="{{$googlePlayLink}}" target="_blank"><i class="google play icon"></i></a>
                                </div>

                                <div class="apple store button">
                                    <a href="{{$appleStoreLink}}" target="_blank"><i class="apple store icon"></i></a>
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