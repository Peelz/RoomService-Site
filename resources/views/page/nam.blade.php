<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>

	<link rel="stylesheet" type="text/css" href="css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="css/components/sidebar.min.css">
	<link rel="stylesheet" type="text/css" href="calendar-master/zabuto_calendar.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
	<script src="calendar-master/zabuto_calendar.min.js"></script>
	<script src="css/semantic.min.js"></script>


	<title>	หน้าแรก </title>
</head>
<body>
	<div class="row">
		<div class="ui top massive menu">
			<div class="item"> Lab Service </div>
		</div>
	</div>

	<div class="ui grid">
		<div class="three wide column">
			<div class="aside">
				<div class="ui vertical large menu">
				  <div class="item">
					  <div class="header">เข้าสู่ระบบ</div>

					<form action="" class="ui form">
						<div class="field"><label for="">ID</label><input type="text"></div>
						<div class="field"><label for="">Password</label><input type="text"></div>
						<div class="inline field">
					      <div class="ui checkbox">
					        <input type="checkbox" tabindex="0">
					        <label>จำรหัสผ่าน</label>
					      </div>
					    </div>
						<div class="ui submit button">Submit</div>

					</form>
				  </div>
				</div>
			</div>
		</div>

		<div class="thirteen wide column">
			<div class="ui segment">
				<div id="my-calendar"></div>
				<script type="application/javascript">
				    $(document).ready(function () {
						$("#my-calendar").zabuto_calendar({
					      show_previous: false,
					      show_next: 2,
						  today: true
					    });
					    $('.sidebar').sidebar('toggle');
				    });
				</script>
			</div>
			<div class="ui container">
				<div class="content">
					<table class="ui striped table">
						<h2 class="ui dividing header">ข้อมูลการใช้ห้อง<a class="anchor" id="content"></a></h2>
					  <thead>
					    <tr>
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
					  <tbody>
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

					<div class="ui segment">
						<h2 class="ui dividing header">สถิติ<a class="anchor" id="content"></a></h2>
					</div>
				</div>
			</div>
		</div>


	</div>

	<style>
		.aside:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		.content{
			display: inline-block;
		}
		.content:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		body {
			background-color: #BEF5BE;
		}
		.ui.massive.menu {
    		background-color: #64CD3C;
		}
	</style>

</body>
</html>
