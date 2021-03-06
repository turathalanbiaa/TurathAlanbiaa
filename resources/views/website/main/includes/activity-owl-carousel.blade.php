<div class="owl-carousel activity-owl-carousel">
    @foreach($latestActivities as $activity)
        <div class="item">
            <div class="ui fluid card">
                <a class="image" href="/activity?id={{$activity->id}}">
                    <img src="{{asset("/storage/" . $activity->Images[0]->image)}}">
                </a>
                <a class="content" href="/activity?id={{$activity->id}}">
                    <p class="ui right aligned ellipsis header">
                        {{$activity->title}}
                    </p>
                </a>
            </div>
        </div>
    @endforeach
</div>

<script>
    $('.activity-owl-carousel').owlCarousel({
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        rtl:true,
        loop:true,
        center:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:3750,
        autoplayHoverPause:true,
        lazyLoad:true,
        responsive:{
            0:{
                items:1,
                margin:10
            },
            600:{
                items:2,
                margin:15
            },
            950:{
                items:3,
                margin:20
            },
            1100:{
                items:3,
                margin:20
            }
        }
    });
</script>