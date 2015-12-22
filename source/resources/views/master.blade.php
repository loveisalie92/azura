<!DOCTYPE html>
<html>
    <head>
        <title>Main page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="{{ asset('html/css/bootstrap.min.css') }}">
	    <link rel="stylesheet/less" type="text/css" href="{{ asset('html/css/style.less') }}" />
        <script type="text/javascript" src="{{asset('html/js/less.min.js')}}"></script>
        @yield('css')
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>

        <script src="{{ asset('html/js/jquery-1.11.3.js') }}"></script>
    	<script src="{{ asset('html/js/bootstrap.min.js') }}"></script>
        @yield('js')
    </body>
</html>
