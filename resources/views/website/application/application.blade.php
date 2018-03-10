@extends("website.layout.layout")

@section("title")
    <title>التطبيقات</title>
    <link href="{{asset("/css/slideshow.css")}}" rel="stylesheet" type="text/css">
@endsection

@section("content")
    @include("website.layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui application grid">
            <div class="ten wide column">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <div class="ui middle aligned small right floated image">
                            <img src="{{asset("/storage/" . $application->Images[0]->image)}}">
                        </div>

                        <h2 class="ui inverted header">
                            <span>تطبيق - </span>
                            <span>{{$application->title}}</span>
                            <div class="sub header">
                                <i class="calendar olive icon"></i>
                                <span>{{$application->date}}</span>
                            </div>
                        </h2>
                    </div>

                    <div class="sixteen wide column">
                        <p class="ui inverted header">{{$application->content}}</p>
                    </div>

                    <div class="sixteen wide column">
                        @include("website.application.slideshow")
                    </div>

                    @if(!is_null($application->videoLink))
                        <div class="sixteen wide column">
                            <div class="ui divider"></div>
                            <div class="ui hidden divider"></div>
                            <div class="ui hidden divider"></div>
                            <div class="ui embed" data-url="{{$application->videoLink}}" data-placeholder="{{asset("/storage/" . $application->Images[0]->image)}}"></div>
                        </div>
                    @endif

                    <div class="sixteen wide column">
                        <div class="ui divider"></div>
                        <div class="ui hidden divider"></div>
                        <div class="ui hidden divider"></div>
                        <div class="ui center aligned large inverted header">حمل التطبيق الآن من</div>
                        <div class="ui hidden divider"></div>
                        <div class="ui hidden divider"></div>

                        <?php
                        $links = explode("<>", $application->externalLink);
                        $googlePlayLink = $links[0];
                        $appleStoreLink = $links[1];

                        if ($googlePlayLink == "notFound")
                            $googlePlayLink = "https://play.google.com/store/apps/developer?id=turath.alanbiaa&hl=ar";

                        if ($appleStoreLink == "notFound")
                            $appleStoreLink = "https://itunes.apple.com/us/developer/ali-faris-abed/id1150792622?mt=8";
                        ?>

                        <div class="ui center aligned header">
                            <a class="ui special button" href="{{$googlePlayLink}}" target="_blank">
                                <img src="{{asset("/img/google-play.png")}}">
                            </a>

                            <a class="ui special button" href="{{$appleStoreLink}}" target="_blank">
                                <img src="{{asset("/img/app-store.png")}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="six wide column">
                show other apps
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{asset("/js/slideshow.js")}}"></script>
    <script>
        $(".ui.embed").embed();
    </script>
@endsection