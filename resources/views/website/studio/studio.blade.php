@extends("website.layout.layout")

@section("title")
    <title>الاستوديو</title>
@endsection

@section("content")
    @include("website.layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column studio grid">
            <div class="column">
                @if(!is_null($showItem))
                    <div class="ui center aligned grid">
                        <div class="ten wide computer fourteen wide tablet sixteen wide mobile column">
                            <div class="ui embed" data-source="youtube" data-id="{{$showItem->videoLink}}" data-placeholder="{{asset("/img/studio.png")}}"></div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="column">
                <div class="ui right aligned inverted dividing header">احدث الفيديوهات</div>

                <div class="ui three column computer only grid">
                    @foreach($items as $item)
                        <div class="column">
                            <div class="ui fluid studio card">
                                <div class="content">
                                    <a href="/studio?id={{$item->id}}">{{$item->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="ui two column tablet only grid">
                    @foreach($items as $item)
                        <div class="column">
                            <div class="ui fluid studio card">
                                <div class="content">
                                    <a href="/studio?id={{$item->id}}">{{$item->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="ui one column mobile only grid">
                    @foreach($items as $item)
                        <div class="column">
                            <div class="ui fluid studio card">
                                <div class="content">
                                    <a href="/studio?id={{$item->id}}">{{$item->title}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if($items->hasPages())
                <div class="ui center aligned column">
                    {{$items->links()}}
                </div>
            @endif
        </div>

        @include("website.layout.footer")
    </div>
@endsection

@section("script")
    <script>
        $(".ui.embed").embed();

        $(document).ready(function () {
            var pagination = $(".pagination");
            pagination.removeClass("pagination").addClass("ui pagination olive menu");
            // $('.pagination').addClass('ui right aligned pagination olive menu');
            pagination.css({'padding':'0','font-size':'14px'});
            pagination.find('li').addClass('item');
        });
    </script>
@endsection