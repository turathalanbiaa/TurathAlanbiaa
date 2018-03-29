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
                <h3 class="ui right floated inverted header">
                    <span>آخر النشاطات</span>
                </h3>
                <h3 class="ui left floated inverted header">
                    <div class="ui dropdown">
                        <input type="hidden" name="orderBy">
                        <i class="dropdown icon"></i>
                        <div class="default text">فرز حسب</div>
                        <div class="menu">
                            <a class="item" href="/activities?orderBy=date">تأريخ</a>
                            <a class="item" href="/activities?orderBy=views">عدد المشاهدات</a>
                        </div>
                    </div>
                </h3>
            </div>

            <div class="column">
                <div class="ui three link cards" id="cards">
                    @foreach($activities as $activity)
                        <a class="card" href="/activity?id={{$activity->id}}">
                            <div class="image">
                                <img src="{{asset("/storage/" . $activity->Images[0]->image)}}" style="height: 225px;">
                            </div>

                            <div class="content">
                                <div class="header">{{$activity->title}}</div>
                            </div>

                            <div class="extra content">
                                <span class="left floated">
                                    {{$activity->date}}
                                    <i class="calendar alternate olive icon"></i>
                                </span>

                                <span class="right floated">
                                    <i class="eye teal icon"></i>
                                    {{$activity->views}}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            @if($activities->hasPages())
                <div class="ui center aligned column">
                    @if(isset($_GET["orderBy"]))
                        {{$activities->appends(['orderBy' => $_GET["orderBy"]])->links()}}
                    @else
                        {{$activities->links()}}
                    @endif
                </div>
            @endif
        </div>

        @include("website.layout.footer")
    </div>
@endsection

@section("script")
    <script>
        $(window).ready(function () {
            var w = window.innerWidth;
            var cards = $("#cards");
            cards.removeAttr('class');

            //Desktop Device
            if (w>991)
            {
                cards.addClass("ui three link cards");
                console.log("Desktop Device");
            }
            //Tablet Device
            else if (w<=991 && w>=600)
            {
                cards.addClass("ui two cards");
                console.log("Tablet Device");
            }
            //Mobile Device
            else if (w<600)
            {
                cards.addClass("ui one cards");
                console.log("Mobile Device");
            }
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