@extends("website.layout.layout")

@section("title")
    <title>النشاطات</title>
@endsection

@section("content")
    @include("website.layout.navbar")
    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column all-activity grid">
            <div class="column">
                <div class="ui divided grid">
                    <div class="sixteen wide mobile eleven wide tablet eleven wide computer column">
                        <div class="ui one column grid">
                            <!-- activity details -->
                            <div class="column">
                                <h2 class="ui right aligned inverted dividing header">
                                    <span>{{$activity->title}}</span>
                                    <div class="sub header">
                                        <i class="ui calendar alternate olive icon"></i>
                                        <span>{{$activity->date}}</span>
                                    </div>
                                </h2>

                                @if(!is_null($activity->videoLink))
                                    <div class="ui embed" data-url="{{$activity->videoLink}}" data-placeholder="{{asset("/storage/" . $activity->Images[0]->image)}}"></div>
                                    <div class="ui divider"></div>
                                @endif

                                <div class="ui medium left floated image" id="activity-image">
                                    <a class="ui left corner label" onclick="$('.ui.modal').modal('show');">
                                        <i class="zoom black icon"></i>
                                    </a>
                                    <img src="{{asset("/storage/" . $activity->Images[0]->image)}}">
                                </div>

                                <?php $lines = explode(".",$activity->content); ?>
                                @foreach($lines as $line)
                                    <p class="line">{{$line}}</p>
                                @endforeach

                                @if(!is_null($activity->externalLink))
                                    <p class="ui olive header">
                                        <span>روابط أخرى حول هذا النشاط - </span>
                                        <a href="{{$activity->externalLink}}">
                                            <span> أضغط هنا </span>
                                        </a>
                                    </p>
                                @endif
                            </div>

                            <!-- Activity albums -->
                            @if(count($activity->Images) > 1)
                                <div class="column">
                                    @include("website.activity.albums")
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="sixteen wide mobile five wide tablet five wide computer column">
                        <div class="ui medium inverted header">
                            <span>آخر النشاطات</span>
                        </div>

                        <div class="ui link activities pointing list">
                            @foreach($allActivities as $singleActivity)
                                <a class="item" href="/activity?id={{$singleActivity->id}}">
                                    {{$singleActivity->title}}
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
        <img class="ui fluid thumbnail image" src="{{asset("/storage/" . $activity->Images[0]->image)}}">
    </div>
@endsection

@section("script")
    <script>
        $(window).ready(function () {
            var w = window.innerWidth;

            if (w<992)
                $("#activity-image-image").removeClass("medium").addClass("small");
        });
        $(".ui.dropdown").dropdown({
            transition: 'fade up'
        });
        $('.ui.embed').embed();
    </script>
@endsection