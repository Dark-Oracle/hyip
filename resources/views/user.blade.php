<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @include('partial.head')
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>


<!-- Fixed navbar -->
<div class="user__sidebar__wrap">
    <i class="fa fa-bars phpdebugbar-fa-2x user__sidebar__call" aria-hidden="true"></i>
</div>

{{--<nav class="navbar navbar-default navbar-static-top">
    @include('partial.usermainmenu')
</nav>--}}
@include('partial.usermainmenu')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('partial.usersidemenu')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>

@include('partial.scripts')

<script>
    $(document).ready(function(){
        $(".user__sidebar__call").on("click", function () {
            var state = $(".sidebar").css("display");

            if(state == "block"){
                $(".sidebar").hide(100);
            }else{
                $(".sidebar").show(100);
            }
        });
    });
</script>
</body>
</html>
