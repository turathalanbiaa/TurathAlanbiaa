@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>الاستوديو</title>
@endsection

@section("content")
    <div class="ui segment">
        <div class="ui grid">
            <div class="thirteen wide computer thirteen wide tablet sixteen wide mobile column">
                <form class="ui large form" method="get" action="/ControlPanel/videos" dir="rtl">
                    <div class="sixteen wide field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="بحث عن فديو... " name="query" style="text-align: right;">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="three wide computer three wide tablet sixteen wide mobile column">
                <a class="ui fluid positive large button" href="/ControlPanel/video/create">
                    <span>أضافة</span>
                </a>
            </div>

            <div class="sixteen wide column">
                <table class="ui celled large unstackable table">
                    <thead>
                    <tr>
                        <th class="center aligned">رقم</th>
                        <th class="right aligned">عنوان الفديو</th>
                        <th class="center aligned">رابط الفديو على YouTube</th>
                        <th class="center aligned">التاريخ</th>
                        <th class="center aligned">خيارات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(count($videos) > 0)
                        @foreach($videos as $video)
                            <tr>
                                <td class="center aligned">{{$video->id}}</td>
                                <td class="right aligned">{{$video->title}}</td>
                                <td class="left aligned">
                                    <a href="https://www.youtube.com/watch?v={{$video->videoLink}}" target="_blank">
                                        {{"https://www.youtube.com/watch?v=" . $video->videoLink}}
                                    </a>
                                </td>
                                <td class="center aligned">{{$video->date}}</td>
                                <td class="center aligned">
                                    <button class="ui fluid red button" data-action="delete" data-id="{{$video->id}}">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <div class="ui center aligned header">
                                    <div class="ui hidden divider"></div>
                                    <div class="ui hidden divider"></div>
                                    <div class="ui hidden divider"></div>
                                    <span>لا توجد نتائج</span>
                                    <div class="ui hidden divider"></div>
                                    <div class="ui hidden divider"></div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

            @if($videos->hasPages())
                <div class="sixteen wide teal column">
                    @if(isset($_GET["query"]))
                        {{$videos->appends(['query' => $_GET["query"]])->links()}}
                    @else
                        {{$videos->links()}}
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="ui mini modal">
        <h3 class="ui center aligned top attached grey inverted header">
            <span>هل انت متأكد من حذف هذا الفيديو !!!</span>
        </h3>
        <div class="content">
            <div class="ui hidden divider"></div>

            <h3 class="ui center aligned header">
                <span>رقم الفديو هو - </span>
                <span id="activity-number"></span>
            </h3>

            <div class="ui divider"></div>

            <div class="actions" style="text-align: center;">
                <button class="ui positive button">نعم</button>
                <button class="ui negative button">لا</button>
            </div>

            <div class="ui hidden divider"></div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        $(document).ready(function () {
            var pagination = $(".pagination");
            pagination.removeClass("pagination").addClass("ui right aligned pagination teal menu");
            pagination.css("padding","0");
            pagination.find('li').addClass('item');
        });
        $("button[data-action='delete']").click(function () {
            $("#activity-number").html($(this).data("id"));
            $(".modal")
                .modal({
                    'closable' : false,
                    'transition': 'horizontal flip'
                })
                .modal("show");
        });
        $("button.positive.button").click(function () {
            var id = $("#activity-number").html();
            var _token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "/ControlPanel/video/delete",
                data: {_token:_token, id:id},
                datatype: 'json',
                success: function(result) {
                    if (result["notFound"] == true)
                    {
                        snackbar("هذا الفديو غير موجود." , 3000 , "warning");
                    }

                    if (result["success"] == false)
                    {
                        snackbar("لم يتم حذف الفديو, يرجى اعدة المحاولة." , 3000 , "error");
                    }
                    else if (result["success"] == true)
                    {
                        snackbar("تم حذف الفديو." , 3000 , "success");
                    }
                },
                error: function() {
                    snackbar("تحقق من الاتصال بالانترنت" , 3000 , "error");
                } ,
                complete : function() {

                }
            });
        });
    </script>
@endsection