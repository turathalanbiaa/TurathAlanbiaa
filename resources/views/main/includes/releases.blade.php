<div class="ui two column grid">
    @foreach($releases as $release)
        <div class="column">
            <div class="ui fluid card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a href="/release?id={{$release->id}}">
                                    <h4 class="ui inverted header">{{$release->title}}</h4>
                                </a>

                                <button class="ui inverted small button">تحميل</button>
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
    $('.releases .ui.fluid.card .image').dimmer({
        on: 'hover'
    });
</script>