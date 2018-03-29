@extends("website.layout.layout")

@section("title")
    <title>تراث الأنبياء</title>
@endsection

@section("content")
    @include("website.layout.navbar")

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
                    <a class="ui inverted basic tiny button" href="/news/all">عرض الكل</a>
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
                    <a class="ui inverted basic tiny button" href="/activities">عرض الكل</a>
                </div>
            </div>
        </div>

        <div class="ui one column section-student grid">
            <div class="column">
                <fieldset>
                    <legend>الطلبة المتميزون</legend>

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
            <div class="sixteen wide computer sixteen wide tablet sixteen wide mobile column">
                <fieldset class="releases">
                    <legend>الأصدارات</legend>

                    <div class="ui one column releases grid">
                        <div class="column">
                            @include("website.main.includes.releases",array(["releases"=>$releases]))
                        </div>
                    </div>
                </fieldset>

                <div class="section-releases-button">
                    <a class="ui inverted basic tiny button" href="/releases">عرض الكل</a>
                </div>
            </div>

            <div class="eight wide computer sixteen wide tablet sixteen wide mobile column" style="display: none;">
                <fieldset class="application">
                    <legend>التطبيقات</legend>

                    <div class="ui one column application grid">
                        <div class="column">
                            @include("website.main.includes.application",array(["applications"=>$applications]))
                        </div>
                    </div>
                </fieldset>

                <div class="section-application-button">
                    <a class="ui inverted basic tiny button" href="/applications">عرض الكل</a>
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
                    <a class="ui inverted basic tiny button" href="/qc-activities">عرض الكل</a>
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

