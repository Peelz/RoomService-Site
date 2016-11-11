<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/css/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="/css/components/sidebar.min.css">
        <link rel="stylesheet" type="text/css" href="/calendar-master/zabuto_calendar.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="/css/custom/style.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
        <script src="/calendar-master/zabuto_calendar.min.js"></script>
        <script src="/css/semantic.min.js"></script>


        @stack('addPlugin')

        <title>@yield('title')</title>
    </head>
    <body>
        @include('layouts._partial.header')

        @yield('content')

        @include('layouts._partial.footer')
    </body>
</html>
