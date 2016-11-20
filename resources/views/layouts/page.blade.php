<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/components/sidebar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/calendar-master/zabuto_calendar.min.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/custom/style.css')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
        <script src="{{ URL::asset('/css/semantic.min.js')}}"></script>

        @stack('meta')
        @stack('addPlugin')

        <title>
            @if( isset($data['title']) )
                {{ $data['title']}}
            @else
                {{ "ระบบจองห้องแล็บ" }}
            @endif
        </title>
    </head>
    <body>
        @include('layouts._partial.header')

        @yield('content')

        @include('layouts._partial.footer')
    </body>
</html>
