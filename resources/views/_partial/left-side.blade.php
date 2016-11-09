@extends('page.content')

@push('addJs')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
	<script src="calendar-master/zabuto_calendar.min.js"></script>
	<script src="css/semantic.min.js"></script>
@endpush

@push('addCss')
    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="css/components/sidebar.min.css">
	<link rel="stylesheet" type="text/css" href="calendar-master/zabuto_calendar.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush


@section('left-side')
    @if( Auth::check() )

    @else

    @endif

@endsection
