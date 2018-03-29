@extends("website.layout.layout")

@section("title")
    <title>الاستوديو</title>
@endsection

@section("content")
    @include("website.layout.navbar")

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column studio grid">
            <div class="column">
                <div class="ui center aligned grid">
                    <div class="ten wide computer sixteen wide tablet sixteen wide mobile column">
                        <div class="ui embed" data-source="youtube" data-id="yu-KS7Q4-FQ" data-placeholder="{{asset("/img/studio.png")}}"></div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="ui grid">
                    <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                        <div class="ui embed" data-source="youtube" data-id="jKiiM36FwxU" data-placeholder="{{asset("/img/studio.png")}}"></div>
                    </div>

                    <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                        <div class="ui embed" data-source="youtube" data-id="YTDJ24avln4" data-placeholder="{{asset("/img/studio.png")}}"></div>
                    </div>

                    <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                        <div class="ui embed" data-source="youtube" data-id="bd_Q9dbIzZs" data-placeholder="{{asset("/img/studio.png")}}"></div>
                    </div>

                    <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                        <div class="ui embed" data-source="youtube" data-id="I5SgvFmlVmg" data-placeholder="{{asset("/img/studio.png")}}"></div>
                    </div>
                </div>
            </div>
        </div>

        @include("website.layout.footer")
    </div>
@endsection

@section("script")
    <script>
        $('.ui.embed').embed();
    </script>
@endsection