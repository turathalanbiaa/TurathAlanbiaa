@extends("website.layout.layout")

@section("title")
    <title>الأصدارات</title>
@endsection

@section("content")
    @include("website.layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui releases grid">
            @foreach($releases as $release)
                <div class="sixteen wide mobile sixteen wide tablet eight wide computer column">
                    <div class="ui release fluid card">
                        <div class="content">
                            <div class="cover">
                                <div class="shape">
                                    <div class="perspective">
                                        <img class="ui image" style="width: 100%; height: 100%;" src="{{asset("/storage/" . $release->Images[0]->image)}}">
                                    </div>
                                </div>
                            </div>

                            <div class="description">
                                <div class="header">
                                    <h4 class="ui inverted header">
                                        <i class="book olive icon" style="margin: 0"></i>
                                        {{$release->title}}
                                    </h4>
                                    <p>{!! $release->content !!}</p>
                                </div>

                                <div class="footer">
                                    @if(is_null($release->file))
                                        <div title="لايوجد" class="ui red icon button"><i class="cloud download alternate icon"></i></div>
                                    @else
                                        <a href="/release/download?id={{$release->id}}" target="_blank" class="ui red icon button"><i class="cloud download alternate icon"></i></a>
                                    @endif

                                    @if(is_null($release->externalLink))
                                        <div title="لايوجد" class="ui yellow icon button"><i class="external link alternate icon"></i></div>
                                    @else
                                        <a href="{{$release->externalLink}}" target="_blank" class="ui yellow icon button"><i class="external link alternate icon"></i></a>
                                    @endif

                                    @if(is_null($release->videoLink))
                                        <div title="لايوجد" class="ui green icon button"><i class="video icon"></i></div>
                                    @else
                                        <a href="{{$release->videoLink}}" target="_blank" class="ui green icon button"><i class="video icon"></i></a>
                                    @endif
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
        $(document).ready(function () {
            var pagination = $(".pagination");
            pagination.removeClass("pagination").addClass("ui right aligned pagination olive menu");
            // $('.pagination').addClass('ui right aligned pagination olive menu');
            pagination.css({'padding':'0','font-size':'14px'});
            pagination.find('li').addClass('item');
        });

        var quill = new Quill('.ql-editor');
        quill.enable(false);

        $(".ql-tooltip").css("display","none");
    </script>
@endsection