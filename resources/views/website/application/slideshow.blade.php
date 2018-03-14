@if(count($application->Images) > 1)
    <?php
        $counts = count($application->Images);
    ?>

    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        @for ($i = 1; $i < $counts; $i++)
            <div class="mySlides fadeIn animated">
                <div class="numbertext"> {{$i}} / {{$counts-1}} </div>
                <img src="{{asset("/storage/" . $application->Images[$i]->image)}}" style="width:100%">
                {{--<div class="text">Caption Text</div>--}}
            </div>
        @endfor

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        @for ($i = 1; $i < $counts; $i++)
            <span class="dot" onclick="currentSlide({{$i}})"></span>
        @endfor
    </div>
@endif