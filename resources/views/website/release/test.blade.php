@foreach($releases as $release)
    <div class="sixteen wide mobile eight wide tablet eight wide computer column">
        <div class="ui release fluid card">
            <div class="content">
                <div class="app logo">
                    <img class="ui circular image" src="{{asset("/storage/" . $release->Images[0]->image)}}">
                </div>

                <div class="app description">
                    <p class="title">{{$release->title}}</p>
                    <p class="detail">{{$release->content}}</p>
                </div>
            </div>

            <div class="footer">
                <div class="text">
                    <p>التطبيق متوفر الآن على</p>
                </div>

                <div class="app buttons">
                    <div class="info button">
                        <a href="/application?id={{$release->id}}"><i class="info icon"></i></a>
                    </div>

                    <?php
                    $links = explode("<>", $release->externalLink);
                    $googlePlayLink = $links[0];
                    $appleStoreLink = $links[1];

                    if ($googlePlayLink == "notFound")
                        $googlePlayLink = "https://play.google.com/store/apps/developer?id=turath.alanbiaa&hl=ar";

                    if ($appleStoreLink == "notFound")
                        $appleStoreLink = "https://itunes.apple.com/us/developer/ali-faris-abed/id1150792622?mt=8";
                    ?>

                    <div class="google play button">
                        <a href="{{$googlePlayLink}}" target="_blank"><i class="google play icon"></i></a>
                    </div>

                    <div class="apple store button">
                        <a href="{{$appleStoreLink}}" target="_blank"><i class="apple store icon"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach