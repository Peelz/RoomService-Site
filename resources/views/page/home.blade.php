@extends('layouts.page')

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endpush
@push('addPlugin')

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <!-- graph -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />

    <script src='http://fullcalendar.io/js/fullcalendar-2.2.3/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.min.js'></script>

@endpush

@section('content')
<!-- เมนูข้างๆ -->
	<div class="row">
    @include('layouts._partial.side-menu')
<!-- ปฎิทิน -->
		 <div class="col-9 col-m-9">
			<div class="container">
				<div class="row">
  				<div class="col-md-12" style="
    				background-color: white;">
				<div id='calendar'></div>
				<script type="application/javascript">

                    $('#calendar').fullCalendar({
                        dayClick: function(date) {
                            Checking(date.format()) ;
                        }

                    });

                    function Checking(param){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: "POST",
                            url: "/api/calendar/checking",
                            dataType:"json",
                            data: {
                                date: param
                            }
                        }).done(function(data) {
                            var table = $('#booking-table > tbody ');
                            table.find('tr').remove();
                            var html;
                            console.log(data.length) ;
                            if(data.length > 0){
                                $.each(data, function(i, collect){
                                    var tr = $('<tr>');
                                    $.each(collect, function(i, value){
                                        var td = $('<td>').append(value);
                                        tr.append(td);
                                    });
                                    table.append(tr) ;

                                });
                            }else{
                                var tr = $('<tr>');
                                table.append(tr.append("<td> ไม่ม่การจอง </td>"));
                            }


                        });
                    }

				</script>
				</div>
  			</div>

		</div>


			</div>
		</div>

<!-- ประวัติการใช้งานห้อง -->
	<div class="row">
		<div class="col-3 col-m-3">
		</div>


		<div class="col-9 col-m-9">
			<div class="ui container">
				<div class="content">
					<table class="ui striped celled table" id="booking-table">
						<h2 class="ui dividing header"><i class="history icon"></i>ข้อมูลการใช้ห้อง<a class="anchor" id="content"></a></h2>
					  <thead>
					  	<tr>
					    <!-- <tr class="ui inverted grey table"> -->
					      <th>เวลา</th>
					      <th>ห้อง</th>
					      <th>อาคาร</th>
					      <th>ผู้จอง</th>
                          <th>หมายเหตุ</th>
					    </tr>
					  </thead>
					  <tbody >
                          @if( $data['roomBooking']->count() > 0 )
                              @foreach($data['roomBooking'] as $booking)
                                  <tr>
                                      <td>{{ $booking->time}}</td>
                                      <td>{{ $booking->room->room_id }}</td>
                                      <td>{{ $booking->room->build }}</td>
                                      <td>{{ $booking->user->full_name }}</td>
                                      <td>{{ $booking->note }}</td>
                                  </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td>ไม่มีการจอง</td>
                              </tr>
                          @endif
					  </tbody>
					</table>
				</div>
			</div><br>

<!-- กราฟ -->
			<div class="ui container">
				<div class="content">
					<h2 class="ui dividing header"><i class="bar chart icon"></i>ข้อมูลสถิติ<a class="anchor" id="content"></a></h2><br>
				</div>
				       <script>
      var chart = AmCharts.makeChart( "chartdiv", {
        "type": "serial",
        "theme": "light",
        "dataProvider": [ {
          "country": "USA",
          "visits": 2025
        }, {
          "country": "China",
          "visits": 1882
        }, {
          "country": "Japan",
          "visits": 1809
        }, {
          "country": "Germany",
          "visits": 1322
        }, {
          "country": "UK",
          "visits": 1122
        }, {
          "country": "France",
          "visits": 1114
        }, {
          "country": "India",
          "visits": 984
        }, {
          "country": "Spain",
          "visits": 711
        }, {
          "country": "Netherlands",
          "visits": 665
        }, {
          "country": "Russia",
          "visits": 580
        }, {
          "country": "South Korea",
          "visits": 443
        }, {
          "country": "Canada",
          "visits": 441
        }, {
          "country": "Brazil",
          "visits": 395
        } ],
        "valueAxes": [ {
          "gridColor": "#FFFFFF",
          "gridAlpha": 0.2,
          "dashLength": 0
        } ],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [ {
          "balloonText": "[[category]]: <b>[[value]]</b>",
          "fillAlphas": 0.8,
          "lineAlpha": 0.2,
          "type": "column",
          "valueField": "visits"
        } ],
        "chartCursor": {
          "categoryBalloonEnabled": false,
          "cursorAlpha": 0,
          "zoomable": false
        },
        "categoryField": "country",
        "categoryAxis": {
          "gridPosition": "start",
          "gridAlpha": 0,
          "tickPosition": "start",
          "tickLength": 20
        },
        "export": {
          "enabled": true
        }

      } );
      </script>
      <div id="chartdiv"style="overflow: visible;text-align: left;background-color: white;"></div>
			</div>
		</div>
	</div>






@endsection
