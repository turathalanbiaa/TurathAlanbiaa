@extends("controlPanel.layout.mainLayout")

@section("title")
    <title>الاجوبة الميسرة</title>
@endsection

@section("content")
    <div class="ui segment">
        <div class="ui grid">
            <div class="thirteen wide computer thirteen wide tablet sixteen wide mobile column">
                <form class="ui large form" method="get" action="/ControlPanel/masaels" dir="rtl">
                    <div class="sixteen wide field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="بحث عن سؤال... " name="query" style="text-align: right;">
                            <i class="search icon"></i>
                        </div>
                    </div>
                </form>
            </div>

            <div class="three wide computer three wide tablet sixteen wide mobile column">
                <a class="ui fluid positive large button" href="/ControlPanel/masael/create">
                    <span>أضافة</span>
                </a>
            </div>

            <div class="sixteen wide column">
                <table class="ui celled large unstackable table">
                    <thead>
                    <tr>
                        <th class="center aligned">رقم</th>
                        <th class="right aligned">السؤال</th>
                        <th class="right aligned">الجواب</th>
                        <th class="center aligned">خيارات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(count($masaels) > 0)
                        @foreach($masaels as $masael)
                            <tr>
                                <td class="center aligned">{{$masael->id}}</td>
                                <td class="right aligned">{{$masael->question}}</td>
                                <td class="right aligned">{{$masael->answer}}</td>
                                <td class="center aligned">
                                    <button class="ui fluid red button" data-action="delete" data-id="{{$masael->id}}">حذف</button>
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

            @if($masaels->hasPages())
                <div class="sixteen wide teal column">
                    @if(isset($_GET["query"]))
                        {{$masaels->appends(['query' => $_GET["query"]])->links()}}
                    @else
                        {{$masaels->links()}}
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@section("extra-content")
    <div class="ui mini modal">
        <h3 class="ui center aligned top attached grey inverted header">
            <span>هل انت متأكد من حذف هذا السؤال !!!</span>
        </h3>
        <div class="content">
            <div class="ui hidden divider"></div>

            <h3 class="ui center aligned header">
                <span>رقم السؤال هو - </span>
                <span id="masael-number"></span>
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
            $("#masael-number").html($(this).data("id"));
            $(".modal")
                .modal({
                    'closable' : false,
                    'transition': 'horizontal flip'
                })
                .modal("show");
        });
        $("button.positive.button").click(function () {
            var id = $("#masael-number").html();
            var _token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "/ControlPanel/masael/delete",
                data: {_token:_token, id:id},
                datatype: 'json',
                success: function(result) {
                    if (result["notFound"] == true)
                    {
                        snackbar("هذا السؤال غير موجود." , 3000 , "warning");
                    }

                    if (result["success"] == false)
                    {
                        snackbar("لم يتم حذف السؤال,يرجى اعدة المحاولة." , 3000 , "error");
                    }
                    else if (result["success"] == true)
                    {
                        snackbar("تم حذف السؤال." , 3000 , "success");
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