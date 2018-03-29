@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>الطلبة المتميزون</title>
@endsection

@section("content")
    <div class="ui segment">
        <div class="ui grid">
            <div class="thirteen wide computer thirteen wide tablet sixteen wide mobile column">
                <form class="ui large form" method="get" action="/ControlPanel/special-students" dir="rtl">
                    <div class="sixteen wide field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="بحث عن طالب... " name="query" style="text-align: right;">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="three wide computer three wide tablet sixteen wide mobile column">
                <a class="ui fluid positive large button" href="/ControlPanel/special-student/create">
                    <span>أضافة</span>
                </a>
            </div>

            <div class="sixteen wide column">
                <table class="ui celled large unstackable table">
                    <thead>
                    <tr>
                        <th class="center aligned">رقم</th>
                        <th class="right aligned">اسم الطالب</th>
                        <th class="center aligned">التقييم</th>
                        <th class="center aligned">تاريخ الاضافه</th>
                        <th class="center aligned">خيارات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(count($students) > 0)
                        @foreach($students as $student)
                            <tr>
                                <td class="center aligned">{{$student->id}}</td>
                                <td class="right aligned">{{$student->name}}</td>
                                <td class="center aligned">{{$student->stars}}</td>
                                <td class="center aligned">{{"00-" . $student->month . "-" . $student->year}}</td>
                                <td class="center aligned">
                                    <button class="ui fluid red button" data-action="delete" data-id="{{$student->id}}">حذف</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
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

            @if($students->hasPages())
                <div class="sixteen wide teal column">
                    @if(isset($_GET["query"]))
                        {{$students->appends(['query' => $_GET["query"]])->links()}}
                    @else
                        {{$students->links()}}
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="ui mini modal">
        <h3 class="ui center aligned top attached grey inverted header">
            <span>هل انت متأكد من حذف هذا الطالب !!!</span>
        </h3>
        <div class="content">
            <div class="ui hidden divider"></div>

            <h3 class="ui center aligned header">
                <span>رقم الطالب هو - </span>
                <span id="student-number"></span>
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
            $("#student-number").html($(this).data("id"));
            $(".modal")
                .modal({
                    'closable' : false,
                    'transition': 'horizontal flip'
                })
                .modal("show");
        });

        $("button.positive.button").click(function () {
            var id = $("#student-number").html();
            var _token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "/ControlPanel/special-student/delete",
                data: {_token:_token, id:id},
                datatype: 'json',
                success: function(result) {
                    if (result["notFound"] == true)
                    {
                        snackbar("هذا الطالب غير موجود." , 3000 , "warning");
                    }

                    if (result["success"] == false)
                    {
                        snackbar("لم يتم حذف الطالب, يرجى اعدة المحاولة." , 3000 , "error");
                    }
                    else if (result["success"] == true)
                    {
                        snackbar("تم حذف الطالب." , 3000 , "success");
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