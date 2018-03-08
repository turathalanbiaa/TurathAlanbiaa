<div class="owl-carousel news-owl-carousel">
    @foreach($latestNews as $news)
        <div class="item">
            <div class="ui fluid card">
                <a class="image" href="/news?id={{$news->id}}">
                    <img src="{{asset("img/news1.png")}}">
                </a>
                <a class="content" href="/news?id={{$news->id}}">
                    <p class="ui right aligned ellipsis header">
                        {{$news->title}}
                    </p>
                </a>
            </div>
        </div>
    @endforeach
</div>

<script>
    $('.news-owl-carousel').owlCarousel({
        rtl:true,
        loop:true,
        center:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:4250,
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
                items:4,
                margin:20
            }
        }
    });
</script>