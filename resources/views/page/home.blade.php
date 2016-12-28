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
        <div class="container">
          <div class="ui grid">
            <div class="row" >
              <div class="eight wide column">
                <div class="ui white segment" style="">
                  <div id='calendar'></div>
                  <script type="application/javascript">
                        var selected_date = null ;
                        var selected_obj = null ;
                        // current.addClass(selected);
                     // page is now ready, initialize the calendar...
                        // options and github  - http://fullcalendar.io/
                        $('#calendar').fullCalendar({
                          dayClick: function(date, jsEvent, view) {
                              if( date.format() != selected_date ){
                                  $(this).addClass("selected");
                                  selected_date = date.format();
                                  if(selected_obj !== null){
                                      selected_obj.removeClass("selected");
                                      selected_obj = $(this);
                                  }else{
                                      selected_obj = $(this);
                                  }
                                  Checking(date.format());
                                //   console.log(date.format(),selected_date);
                              }
                          }
                        });
                  </script>

                    <!-- <div class="footer"><p>By <a href="http://vtimbuc.net/">Valeriu Timbuc</a> for <a href="http://designmodo.com">DesignModo</a>.</p></div> -->

                </div>
              </div>
    <!--             <div class="one wide column">
                </div> -->
              <div class="seven wide column">
                  <div class="ui white segment" style="
                  width   : 115%;
                  height: 99%;">
                    <div class="content">
                    <h2 class="ui dividing header"><i class="bar chart icon"></i>ข้อมูลสถิติ<a class="anchor" id="content"></a></h2><br>
                    </div>
                    <script>
                        var chart = AmCharts.makeChart( "chartdiv", {
                          "type": "serial",
                          "theme": "light",
                          "dataProvider": {!! $data_booking_month !!},
                          "chartCursor": {
                            "categoryBalloonEnabled": false,
                            "cursorAlpha": 0,
                            "zoomable": false
                          },
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
                          "categoryField": "room",
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
          </div>

        <script type="application/javascript">

            $('#calendar').fullCalendar({
                dayClick: function(date) {
                    Checking(date.format()) ;
                }

            });

            function Checking(param){
                var booking_table = $('#booking-table') ;
                booking_table.dimmer('show');
                booking_table.find('.loader').addClass('active');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{ url('/api/calendar/checking') }}",
                    dataType:"json",
                    data: {
                        date: param
                    }
                })
                .done(function(data) {
                    var table = $('#booking-table > tbody ');
                    table.find('tr').remove();
                    var html;
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

                    booking_table.dimmer('hide');
                    booking_table.find('.loader').removeClass('active');



                });
            }

        </script>

<!-- ประวัติการใช้งานห้อง -->
        <div class="ui white segment" id="booking-table">
            <div class="ui loader"></div>

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
                  @if( $data_booking->count() > 0 )
                      @foreach($data_booking as $booking)
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
              @if( $data_booking->total() > $data_booking->perPage() )
                  <tfoot>
                      <tr>
                          <th colspan="8">
                            <div class="ui right floated pagination menu">
                              <a class="icon item" href="{{ $data_booking->previousPageUrl() }}"><i class="left chevron icon"></i> </a>
                                @for($i=1; $i <= $data_booking->lastPage() ; $i++)
                                    <a href=" {{ url('/?page=').$i }}" class="item"> {{ $i }}</a>
                                @endfor
                              <a class="icon item" href="{{ $data_booking->nextPageUrl() }}"><i class="right chevron icon"></i></a>
                            </div>
                          </th>
                      </tr>
                  </tfoot>
              @endif

			</table>
        </div>
</div>

@endsection
