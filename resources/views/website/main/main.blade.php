@extends("website.layout.layout")

@section("title")
    <title>تراث الأنبياء</title>
@endsection

@section("content")
    @include("website.layout.navbar")

    {{--<style>--}}
        {{--.date {--}}
            {{--position: fixed;--}}
            {{--bottom: 30px;--}}
            {{--left: 30px;--}}
            {{--z-index: 100;--}}
            {{--width: 76px;--}}
            {{--height: 76px;--}}
            {{--border-radius: 100% 100%;--}}
            {{--background-color: rgb(221, 238, 252);--}}
            {{--box-shadow: 0 0 2px 2px rgba(120, 186, 88, 0.78);--}}
        {{--}--}}

        {{--.date:hover {--}}
            {{--cursor: pointer;--}}
            {{--box-shadow: 0 0 7px 7px rgba(120, 186, 88, 1);--}}
        {{--}--}}

        {{--.date i.calendar.icon {--}}
            {{--width: 50px;--}}
            {{--height: 50px;--}}
            {{--margin: 13px 13px;--}}
            {{--color: green;--}}
            {{--font-size: 3em;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<div class="date">--}}
        {{--<i class="ui big calendar icon"></i>--}}
    {{--</div>--}}

    <div class="ui container">
        <div class="ui section-line grid">
            <div class="special-divider"></div>
        </div>

        <div class="ui one column section-news grid">
            <div class="column">
                <fieldset>
                    <legend>أخر الأخبار</legend>

                    <div class="ui one column news grid">
                        <div class="column">
                            @include("website.main.includes.news-owl-carousel",array(["latestNews"=>$latestNews]))
                        </div>
                    </div>
                </fieldset>


                <div class="section-news-button">
                    <a class="ui inverted basic tiny button" href="/all-news">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui one column section-activity grid">
            <div class="column">
                <fieldset>
                    <legend>النشاطات</legend>

                    <div class="ui one column activity grid">
                        <div class="column">
                            @include("website.main.includes.activity-owl-carousel",array(["latestActivities"=>$latestActivities]))
                        </div>
                    </div>
                </fieldset>


                <div class="section-activity-button">
                    <a class="ui inverted basic tiny button" href="/all-activities">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui one column section-student grid">
            <div class="column">
                <fieldset>
                    <legend>الطلبة المتميزين</legend>

                    <div class="ui one column student grid">
                        <div class="column">
                            @include("website.main.includes.special-student",array(["students"=>$students]))
                        </div>
                    </div>
                </fieldset>

                {{--<div class="section-student-button">--}}
                    {{--<a class="ui inverted basic tiny button" href="/all-students">عرض الكل</a>--}}
                {{--</div>--}}
            </div>
        </div>

        <div class="ui section-application-releases grid">
            <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                <fieldset class="releases">
                    <legend>الأصدارات</legend>

                    <div class="ui one column releases grid">
                        <div class="column">
                            @include("website.main.includes.releases",array(["releases"=>$releases]))
                        </div>
                    </div>
                </fieldset>

                <div class="section-releases-button">
                    <a class="ui inverted basic tiny button" href="">عرض الكل</a>
                </div>
            </div>

            <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                <fieldset class="application">
                    <legend>التطبيقات</legend>

                    <div class="ui one column application grid">
                        <div class="column">
                            @include("website.main.includes.application",array(["applications"=>$applications]))
                        </div>
                    </div>
                </fieldset>

                <div class="section-application-button">
                    <a class="ui inverted basic tiny button" href="">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui section-faq-masael grid">
            <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                <fieldset class="faq">
                    <legend>اسئلة شائعة</legend>

                    <div class="ui segment">
                        <div class="ui one column faq grid">
                            <div class="column">
                                @include("website.main.includes.faq",array(["faqQuestions"=>$faqQuestions]))
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="section-faq-button">
                    <a class="ui inverted basic tiny button" href="">عرض الكل</a>
                </div>
            </div>

            <div class="eight wide computer eight wide tablet sixteen wide mobile column">
                <fieldset class="masael">
                    <legend>الأجوبة الميسرة</legend>

                    <div class="ui segment">
                        <div class="ui one column masael grid">
                            <div class="column">
                                @include("website.main.includes.masael",array(["masaelQuestions"=>$masaelQuestions]))
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="section-masael-button">
                    <a class="ui inverted basic tiny button" href="">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui one column section-qamer-center grid">
            <div class="column">
                <fieldset>
                    <legend>نشاطات مركز القمر</legend>

                    <div class="ui one column qamer-center grid">
                        <div class="column">
                            @include("website.main.includes.qamer-center-owl-carousel",array(["latestQamerCenterActivities"=>$latestQamerCenterActivities]))
                        </div>
                    </div>
                </fieldset>


                <div class="section-qamer-center-button">
                    <a class="ui inverted basic tiny button" href="/all-activities">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui one column section-footer grid">
            <div class="column">
                <fieldset class="footer">
                    <legend>روابطنا على مواقع التواصل الأجتماعي</legend>

                    <div class="ui one column footer grid">
                        <div class="column">
                            @include("website.main.includes.footer")
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
@endsection

@section("extra-content")
@endsection

@section("script")
@endsection

