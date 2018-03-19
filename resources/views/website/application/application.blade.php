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

        <div class="ui application divided grid">
            <div class="ten wide computer ten wide tablet sixteen wide mobile column">
                <div class="ui grid">
                    <div class="sixteen wide column">
                        <div class="ui middle aligned right floated tiny image">
                            <img src="{{asset("/storage/" . $application->Images[0]->image)}}">
                        </div>

                        <h2 class="ui inverted header" style="margin-top: 14px;">
                            <span>تطبيق - </span>
                            <span>{{$application->title}}</span>
                            <div class="sub header">
                                <i class="calendar alternate olive icon"></i>
                                <span>{{$application->date}}</span>
                            </div>
                        </h2>
                    </div>

                    <div class="sixteen wide column">
                        <p class="ui inverted header">{{$application->content}}</p>
                        <div class="ui divider"></div>
                    </div>

                    <div class="sixteen wide column">
                        <div class="ui center aligned grid">
                            <div class="eight wide computer ten wide tablet fourteen wide mobile column">
                                @include("website.application.slideshow")
                            </div>
                        </div>
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

            <div class="six wide computer six wide tablet sixteen wide mobile column">
                <h3 class="ui right aligned inverted header">
                    <span>أحدث التطبيقات</span>
                </h3>

                <div class="ui  divider"></div>
                <div class="ui hidden divider"></div>
                <div class="ui hidden divider"></div>

                <div class="ui list">
                    @foreach($applications as $application)
                        <div class="item">
                            <a class="ui middle aligned right floated tiny image" href="/application?id={{$application->id}}">
                                <img src="{{asset("/storage/" . $application->Images[0]->image)}}">
                            </a>

                            <h3 class="ui inverted header" style="padding-top: 10px;">
                                <a href="/application?id={{$application->id}}">
                                    <div class="ui yellow header">
                                        <span>تطبيق - </span>
                                        <span>{{$application->title}}</span>
                                    </div>
                                </a>
                                <div class="sub header">
                                    <i class="calendar alternate olive icon"></i>
                                    <span>{{$application->date}}</span>
                                </div>
                            </h3>
                        </div>
                        <div class="ui divider"></div>
                    @endforeach
                </div>
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