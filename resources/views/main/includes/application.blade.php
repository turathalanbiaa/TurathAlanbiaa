<div class="ui two column grid">
    @foreach($applications as $application)
        <div class="column">
            <div class="ui fluid card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a href="/application?id={{$application->id}}">
                                    <h4 class="ui inverted header">{{$application->title}}</h4>
                                </a>

                                <a href="https://play.google.com/store/apps/developer?id=turath.alanbiaa&hl=ar">
                                    <button class="google-play-button"></button>
                                </a>

                                <a href="https://itunes.apple.com/us/app/%D9%85%D8%B9%D9%87%D8%AF-%D8%AA%D8%B1%D8%A7%D8%AB-%D8%A7%D9%84%D8%A7%D9%86%D8%A8%D9%8A%D8%A7%D8%A1/id1150792623?mt=8">
                                    <button class="app-store-button"></button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset("img/app.png")}}">
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    $('.application .ui.fluid.card .image').dimmer({
        on: 'hover'
    });
</script>