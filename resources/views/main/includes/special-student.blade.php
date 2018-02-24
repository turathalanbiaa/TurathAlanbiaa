<div class="ui grid">
    <div class="computer only row">
        <div class="column">
            <div class="ui three column relaxed grid">
                @foreach($students as $student)
                    <div class="column">
                        <div class="ui black fluid label" style="padding: 13px 10px; text-align: right;">
                            {{$student->name}}
                            <div class="detail" style="margin: 0 !important;">
                                <div class="ui student tiny star rating" data-rating="{{$student->stars}}" data-max-rating="5"></div><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="tablet only row">
        <div class="column">
            <div class="ui two column grid">
                @foreach($students as $student)
                    <div class="column">
                        <div class="ui black fluid label" style="padding: 13px 10px; text-align: right;">
                            {{$student->name}}
                            <div class="detail" style="margin: 0 !important;">
                                <div class="ui student tiny star rating" data-rating="{{$student->stars}}" data-max-rating="5"></div><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mobile only row">
        <div class="column">
            <div class="ui one column grid">
                @foreach($students as $student)
                    <div class="column">
                        <div class="ui black fluid label" style="padding: 13px 10px; text-align: right;">
                            {{$student->name}}
                            <div class="detail" style="margin: 0 !important;">
                                <div class="ui student tiny star rating" data-rating="{{$student->stars}}" data-max-rating="5"></div><br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $('.ui.student.rating').rating('disable');
</script>




