<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield("title")

    {{--Font--}}
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    {{--StyleSheet--}}
    <link href="{{asset("css/semantic.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/animate.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/styleCp.css")}}" rel="stylesheet" type="text/css">

    {{--JQuery--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    {{--Script--}}
    <script src="{{asset("js/semantic.min.js")}}"></script>
</head>
<body>
@yield("content")
@yield("extra-content")
@yield("script")
</body>
</html>
