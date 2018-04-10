<div class="ui four column grid">
    @foreach($releases as $release)
        <div class="column">
            <div class="ui fluid card">
                <div class="blurring dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a>
                                    <h3 class="ui inverted header">{{$release->title}}</h3>
                                </a>

                                <div class="ui hidden divider"></div>

                                @if(is_null($release->file))
                                    <div title="لايوجد" class="ui inverted small button">تحميل</div>
                                @else
                                    <a href="/release/download?id={{$release->id}}" class="ui inverted small button">تحميل</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <img src="{{asset("/storage/" . $release->Images[0]->image)}}">
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