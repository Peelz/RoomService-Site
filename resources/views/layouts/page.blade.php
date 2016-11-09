<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="css/components/sidebar.min.css">
        <link rel="stylesheet" type="text/css" href="calendar-master/zabuto_calendar.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="css/custom/style.css">

        @stack('addCss')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
        <script src="calendar-master/zabuto_calendar.min.js"></script>
        <script src="css/semantic.min.js"></script>

        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

        <!-- graph -->
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
        <script src='http://fullcalendar.io/js/fullcalendar-2.2.3/lib/moment.min.js'></script>
        <script src='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.min.js'></script>
        @stack('addJs')

        <title>@yield('title')</title>
    </head>
    <body>
        @yield('content')
    </body>
</html>
