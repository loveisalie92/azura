<!DOCTYPE html>
<html>
    <head>
        <title>Main page</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="role" content="{{ $role}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="screen" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet/less" type="text/css" href="{{ asset('assets/css/style.less') }}" />
        <script type="text/javascript" src="{{asset('assets/js/less.min.js')}}"></script>
        <script type="text/javascript">
            var baseUrl = "{{asset('/')}}";
        </script>
        @yield('css')
    </head>

    <body>
        @include('_partials.notifications')
        @include('_partials.loading')
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('assets/js/jquery-1.11.3.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('assets/js/dropzone.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        @yield('js')
    </body>
</html>
