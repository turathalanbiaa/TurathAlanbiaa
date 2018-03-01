@extends("layout.layout")

@section("title")
    <title>التطبيقات</title>
    <link href="{{asset("/css/slideshow.css")}}" rel="stylesheet" type="text/css">
@endsection

@section("content")
    @include("layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui application grid">
            <div class="seven wide computer sixteen wide tablet sixteen wide mobile column">
                <h2 class="ui inverted header">
                    <span>التطبيقات - </span>
                    <span>{{$application->title}}</span>
                    <div class="sub header">
                        <i class="calendar olive icon"></i>
                        <span>{{$application->date}}</span>
                    </div>
                </h2>
                <p class="ui medium right aligned inverted header">{{$application->content}}</p>
            </div>

            <div class="nine wide computer sixteen wide tablet sixteen wide mobile column">
                @include("applications.slideshow")
            </div>

            <div class="sixteen wide column">
                @if(!is_null($application->videoLink))
                    <div class="ui divider"></div>
                    <div class="ui hidden divider"></div>
                    <div class="ui hidden divider"></div>
                    <div class="ui hidden divider"></div>
                    <div class="ui hidden divider"></div>
                    <div class="ui center aligned grid">
                        <div class="ten wide computer sixteen wide tablet sixteen wide mobile column">
                            <div class="ui embed" data-url="{{$application->videoLink}}" data-placeholder="{{asset("/img/news1.png")}}"></div>
                        </div>
                    </div>
                    <div class="ui hidden divider"></div>
                    <div class="ui hidden divider"></div>
                @endif
            </div>

            <div class="sixteen wide column">
                <div class="ui divider"></div>
                <div class="ui hidden divider"></div>
                <div class="ui hidden divider"></div>
                <div class="ui center aligned large inverted header">حمل التطبيق الآن من</div>
                <div class="ui hidden divider"></div>
                <div class="ui hidden divider"></div>

               <div class="ui center aligned header">
                   <a class="ui special button" href="https://play.google.com/store/apps/developer?id=turath.alanbiaa&amp;hl=ar">
                       <img src="{{asset("/img/google-play.png")}}">
                   </a>

                   <a class="ui special button" href="https://itunes.apple.com/us/app/%D9%85%D8%B9%D9%87%D8%AF-%D8%AA%D8%B1%D8%A7%D8%AB-%D8%A7%D9%84%D8%A7%D9%86%D8%A8%D9%8A%D8%A7%D8%A1/id1150792623?mt=8">
                       <img src="{{asset("/img/app-store.png")}}">
                   </a>
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