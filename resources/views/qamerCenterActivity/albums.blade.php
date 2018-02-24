<div class="ui three column grid" id="albums">
    <div class="column">
        <img class="ui fluid image" src="{{asset("/img/news1.png")}}">
    </div>
    <div class="column">
        <img class="ui fluid image" src="{{asset("/img/news1.png")}}">
    </div>
    <div class="column">
        <img class="ui fluid image" src="{{asset("/img/news1.png")}}">
    </div>
</div>

<script>
    $(window).ready(function () {
        var w = window.innerWidth;
        var albums = $("#albums");
        albums.removeAttr('class');

        if (w<992)
            albums.addClass("ui one column grid");
        else
            albums.addClass("ui three column grid");
    });
</script>