<html>
<head>
    @section('head')
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <!-- Material Design fonts -->
        <script>
            window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        </script>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/dist/css/bootstrap-material-design.css"/>
    <link rel="stylesheet" type="text/css" href="/dist/css/ripples.min.css"/>
    <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
        <link href="/css/new-age.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('/css/main.css') }}">
    @show
</head>
<body style="background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEMAAABkCAMAAADqvX3PAAAAKlBMVEUAAADX19fX19fBwcHT09PX19fW1tbT09PW1tbV1dXOzs7Ozs7BwcHV1dX5uIg2AAAADnRSTlMAPQAKH0czAAApFAAAAHys1goAAAHwSURBVHja7ZfdcuMwCEb1GUIDcd//dZuk2n5rZzCKOzuzFzo3+XNOBAIHtQosxwi0XUw/jjh2qN1pVzV43FJwJIDLuq5tvaNmzxeEZI5wWP/p9v0gypgGYhGH8fL28yyM7ycOJkFlJW3tZDHhRdBjIO22JR6a1BGMgTAWopvr6BC1jSB1MDWyXYfvkpDlg4iiV83lITiuoXZL+U4/ltcNq2MhogaYBWMYjYU8HHfSRdTrCIOLYImemrfz8dMO6DlVGYyFMWz3tmuGY6GgO1ikXVM51JDXurBO0nyEcyPTnvOXvmyb0hzqfV64jUUYw47Re9CZe6EbeC+M39+TcfK/gTFZuxZgOSag7aMASwGkrQW1Y2lLwXRMx3RMx3T8Pw67FpSOcA5RCccOcTMNL05aRw7Fn2kizA7+1VNH6ENAOBgOxiIK888dHPVqh+Q/yeknzQfHkhx+nqyjT0QFzDUd2Skp53lp7PdFnEkYIhzQv/KRzJUV0QdDSON5+S14CEW0vqSTiAPWWDknCLsY0BZxnNP0L/Z9YQEO8yznXZ2yNwfgTu7rNFgj9aamvS9eZljMTNOeoybSGNwQkvZ+3XrCU07t4HmWSBjDLBzEwdSzhMYcRPRZNYmgdjA1FyahcKQIqpKZs8N0TMd0TMd0/BvHF8n9f8tHo7HcAAAAAElFTkSuQmCC'), #fff;" >
@if(Route::is('root'))
<div id="msg" style="font-size:largest; text-align: center; height: 100vh; width: 100vw; margin: auto; background: no-repeat center url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48c3ZnIHdpZHRoPSc1MHB4JyBoZWlnaHQ9JzUwcHgnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIiBjbGFzcz0idWlsLXJpcHBsZSI+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCIgaGVpZ2h0PSIxMDAiIGZpbGw9Im5vbmUiIGNsYXNzPSJiayI+PC9yZWN0PjxnPiA8YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJvcGFjaXR5IiBkdXI9IjNzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgYmVnaW49IjBzIiBrZXlUaW1lcz0iMDswLjMzOzEiIHZhbHVlcz0iMTsxOzAiPjwvYW5pbWF0ZT48Y2lyY2xlIGN4PSI1MCIgY3k9IjUwIiByPSI0MCIgc3Ryb2tlPSJyZ2JhKDE0NSwxNDUsMTQ1LDAuNzkpIiBmaWxsPSJub25lIiBzdHJva2Utd2lkdGg9IjE1IiBzdHJva2UtbGluZWNhcD0icm91bmQiPjxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9InIiIGR1cj0iM3MiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBiZWdpbj0iMHMiIGtleVRpbWVzPSIwOzAuMzM7MSIgdmFsdWVzPSIwOzIyOzQ0Ij48L2FuaW1hdGU+PC9jaXJjbGU+PC9nPjxnPjxhbmltYXRlIGF0dHJpYnV0ZU5hbWU9Im9wYWNpdHkiIGR1cj0iM3MiIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIiBiZWdpbj0iMS41cyIga2V5VGltZXM9IjA7MC4zMzsxIiB2YWx1ZXM9IjE7MTswIj48L2FuaW1hdGU+PGNpcmNsZSBjeD0iNTAiIGN5PSI1MCIgcj0iNDAiIHN0cm9rZT0icmdiYSgxOTMsMTkzLDE5MywwLjY2KSIgZmlsbD0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIj48YW5pbWF0ZSBhdHRyaWJ1dGVOYW1lPSJyIiBkdXI9IjNzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIgYmVnaW49IjEuNXMiIGtleVRpbWVzPSIwOzAuMzM7MSIgdmFsdWVzPSIwOzIyOzQ0Ij48L2FuaW1hdGU+PC9jaXJjbGU+PC9nPjwvc3ZnPg==')">
<!-- you can set whatever style you want on this -->
</div>
@endif
<div id="body" style="{{ Route::is('root') ? 'display:none' : '' }};">

    @section('header')
        @include('includes.header')
    @show


    @yield('content')


</div>
@section('scripts')
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/dist/js/ripples.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/dist/js/material.min.js"></script>
<script src="/js/new-age.min.js"></script>
<script>
    $.material.init();
@if(Route::is('root'))
    $(document).ready(function() {
    $('#body').show();
    $('#msg').hide();
});
@endif
</script>
@show
</body>
</html>