@extends('layouts.page')

@section('content')

<div class="aside"><h1>LAB SERVICE</h1></div><br>
<!-- เมนูข้างๆ -->
	<div class="row">
        @if(Auth::check())
            <div class="col-3 col-m-3 menu">
              <ul>

                <form action="{{ url('login') }}" class="ui form" method="post">
                    {{ csrf_field() }}

                  <div class="field"><label for=""><br>ID :</label><input type="text" name="id"></div>
                  <div class="field"><label for="">Password :</label><input type="Password" namne="password"></div>
                  <div class="inline field">
                      <div class="ui checkbox">
                         <input type="checkbox" tabindex="0">
                         <label>จดจำรหัสผ่าน</label>
                      </div>
                       <button class="ui green button" type="submit">เข้าสู่ระบบ</button>

                  </div>
                </form>
              </ul>
            </div>

        @else
            <div class="col-3 col-m-3 menu">
				<div class="card">
					  <!-- <img class="card-img-top" src="BG/woman.png" alt="Card image cap"> -->
					  <div class="card-block">
					    <h4 class="card-title">ยินดีต้อนรับเข้าสู่ระบบ ...</h4>
					    <p class="card-text">Somsri</p>
					  </div><br>
					  <ul class="list-group list-group-flush">
					  	<li class="list-group-item">
				    		<a href="#" class="item "><i class="write icon"></i>แก้ไขข้อมูลส่วนตัว</a>
				    	</li>
					    <li class="list-group-item">
				    		<a href="room-request.html" class="item "><i class="building icon"></i>ขอใช้ห้อง</a>
				    	</li>
					    <li class="list-group-item">
				    		<a href="edit.html" class="item"><i class="configure icon"></i>แก้ไข/ยกเลิก</a>
				   		</li>
					    <li class="list-group-item">
				    		<a href="#" class="item"><i class="sign out icon"></i>ออกจากระบบ</a>
				    	</li>
					  </ul>
				</div>
    		</div>
        @endif

<!-- ปฎิทิน -->
		 <div class="col-9 col-m-9">
			<div class="container">
				<div class="row">
  				<div class="col-md-12" style="
    				background-color: white;">
				<div id='calendar'></div>
				<script type="application/javascript">
				    $(document).ready(function() {
 					 // page is now ready, initialize the calendar...
  						// options and github  - http://fullcalendar.io/

					$('#calendar').fullCalendar({
   						 dayClick: function() {
       						 alert('a day has been clicked!');
    					}
					});

					});

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
					<table class="ui striped table">
						<h2 class="ui dividing header"><i class="history icon"></i>ข้อมูลการใช้ห้อง<a class="anchor" id="content"></a></h2>
					  <thead>
					  	<tr>
					    <!-- <tr class="ui inverted grey table"> -->
					      <th>เวลา</th>
					      <th>ห้อง</th>
					      <th>อาคาร</th>
					      <th>อาจารย์ผู้สอน</th>
						  <th>รหัสวิชา</th>
						  <th>ชื่อวิชา</th>
						  <th>หมู่เรียน</th>
						  <th>หมายเหตุ</th>
					    </tr>
					  </thead>
					  <tbody >
						<tr>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
						</tr>
						<tr>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
						</tr>
						<tr>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td>Lorem ipsum dolor sit amet</td>
						</tr>
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



<!-- ส่วนล่าง -->
	<div class="footer">
	<p>Resize the browser window to see how the content respond to the resizing.</p>
	</div>


@endsection
