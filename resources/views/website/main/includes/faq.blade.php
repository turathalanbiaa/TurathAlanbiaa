@foreach($faqQuestions as $question)
    <p class="question"><span>س/ </span>{{$question->question}}</p>
    <p class="answer">{{$question->answer}}</p>
@endforeach