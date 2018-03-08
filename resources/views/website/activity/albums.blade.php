<div class="ui three column grid" id="albums">
    @foreach($activity->Images as $image)
        <div class="column">
            <img class="ui fluid image" src="{{asset("/storage/" . $image->image)}}">
        </div>
    @endforeach
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