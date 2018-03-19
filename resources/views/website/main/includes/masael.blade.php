@foreach($masaelQuestions as $question)
    <p class="question"><span>س/ </span>{{$question->question}}</p>
    <p class="answer"><span>ج/ </span> {{$question->answer}}</p>
@endforeach