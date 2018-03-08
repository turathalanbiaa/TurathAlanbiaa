@extends("layout.layout")

@section("title")
    <title>نشاطات مركز القمر</title>
@endsection

@section("content")
    @include("layout.navbar")
    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column all-qamer-center-activities grid">
            <div class="column">
                <div class="ui divided grid">
                    <div class="sixteen wide mobile eleven wide tablet eleven wide computer column">
                        <div class="ui one column grid">
                            <!-- Activity details -->
                            <div class="column">
                                <h2 class="ui right aligned inverted dividing header">
                                    <span>{{$activity->title}}</span>
                                    <div class="sub header">
                                        <i class="ui calendar olive icon"></i>
                                        <span>{{$activity->date}}</span>
                                    </div>
                                </h2>

                                @if(!is_null($activity->videoLink))
                                    <div class="ui embed" data-url="{{$activity->videoLink}}" data-placeholder="{{asset("/img/news1.png")}}" data-icon="ui play video icon"></div>
                                    <div class="ui divider"></div>
                                @endif

                                <div class="ui medium left floated image" id="activity-image">
                                    <a class="ui left corner label" onclick="$('.ui.modal').modal('show');">
                                        <i class="zoom black icon"></i>
                                    </a>
                                    <img src="{{asset("/img/news1.png")}}">
                                </div>

                                <?php $lines = explode(".",$activity->content); ?>
                                @foreach($lines as $line)
                                    <p class="line">{{$line}}</p>
                                @endforeach
                            </div>

                            <!-- Activity albums -->
                            <div class="column">
                                @include("qamerCenterActivity.albums")
                            </div>
                        </div>
                    </div>

                    <div class="sixteen wide mobile five wide tablet five wide computer column">
                        <div class="ui medium inverted header">
                            <span>آخر النشاطات</span>

                            <div class="ui divider"></div>

                            <div class="ui sub header">
                                <span> الصفحات من </span>
                                <span>1</span>
                                <span> الى </span>
                                <span>{{$allActivities->lastPage()}}</span>

                                <a class="page" href="/all-qc-activities?page=1"><i class="angle right icon"></i></a>
                                <a class="page" href="/all-qc-activities?page=2"><i class="angle double left icon"></i></a>
                                <a class="page" href="/all-qc-activities?page={{$allActivities->lastPage()}}"><i class="angle treble left icon icon"></i></a>
                            </div>
                        </div>

                        <div class="ui divider"></div>

                        <div class="ui link qamer-center-activities pointing list">
                            @foreach($allActivities as $activity)
                                <a class="item" href="/qc-activity?id={{$activity->id}}">
                                    {{$activity->title}}
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
                $("#activity-image-image").removeClass("medium").addClass("small");
        });
        $(".ui.dropdown").dropdown({
            transition: 'fade up'
        });
        $('.ui.embed').embed();
    </script>
@endsection