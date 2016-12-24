<!DOCTYPE html>
<html>
    <head>
        <title>
            @if( isset($data['title']) )
                {{ $data['title']}}
            @else
                {{ "ระบบจองห้องแล็บ" }}
            @endif
        </title>
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/semantic.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/components/sidebar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('calendar-master/zabuto_calendar.min.css')}}">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
        <script src="{{ URL::asset('/css/semantic.min.js')}}"></script>

        <!-- css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/custom/style.css')}}">
        @stack('meta')
        @stack('addPlugin')


    </head>
    <body>
        @include('layouts._partial.header')
        <div class="ui container" id="main-content">
            <div class="ui grid">
                <div class="ui four wide column">
                        @include('layouts._partial.side-menu')

                </div>
                <div class="ui twelve wide stretched column">
                    <div class="aticle">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>



        {{-- @include('layouts._partial.footer') --}}
    </body>
</html>
