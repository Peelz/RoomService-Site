@extends('layouts.page')

@push('addPlugin')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <link rel="stylesheet" href="/timerpicker/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="/timerpicker/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.position.min.js"></script>

    <script type="text/javascript" src="/timerpicker/jquery.ui.timepicker.js?v=0.3.3"></script>
    {{-- <script type="text/javascript" src="/css/components/search.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="/css/components/search.min.css" charset="utf-8"></script> --}}

    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
@endpush
@section('title')
    จองห้อง
@endsection

@section('content')
    <!-- ส่วนเมนูข้างๆ -->
    	<div class="row">
            @include('layouts._partial.side-menu')


    <!-- ส่วนขอใช้งาน -->
    		<div class="col-9 col-m-9">
    			<div class="ui container">
    				<div class="content" >
    					<div class="ui segment">
    						<form action="{{ url('booking/form')}}" method="post" class="ui form">
                                {{ csrf_field() }}

    							<h2 class="ui header"><i class="building icon"></i>ขอใช้ห้องแล็บ</h2>
    							<table class="ui definition table" >
    							  	<tbody >
    									<tr>
    									  <td>รหัสวิชา</td>
    									  <td>
                                              <div class="ui search">
                                                  <div class="ui icon input">
                                                    <input class="prompt" type="text" placeholder="Search countries...">
                                                    <i class="search icon"></i>
                                                  </div>
                                                  <div class="results"></div>
                                              </div>
                                          </td>
    									</tr>
    									<tr>
    									  <td>หมู่เรียน</td>
    									  <td><input type="text" name="sec" value=""></td>
    									</tr>
    									<tr>
    									  <td>ผู้สอน</td>
    									  <td><input type="text" name="instructor" value=""></td>
    									</tr>
    									<tr>
    										<td>จำนวนนิสิต</td>
    										<td><div class="ui right labeled input">
    												  <input type="text" name="quantity_nisit" placeholder="">
    												  <div class="ui label">
    													  คน
    													</div>
    												</div>
    										</td>
    									</tr>
    									<tr>
    										<td>วันที่</td>
    										<td><div class="ui icon input">
    											<input id="daterange" type="date" name="date" >
    											<i class="calendar Outline icon"></i>

    										</div></td>
    									</tr>
    									<tr>
    									<td>เวลา</td>
    										<td>
    										<div class="ui icon input">
    											<input id="start_time" type="text" name="start_time">
    											<i class="time Outline icon"></i>
    										</div>&nbsp;&nbsp;ถึง&nbsp;

    										<div class="ui icon input">
    											<input id="end_time" type="text" name="end_time">
    											<i class="time Outline icon"></i>
    										</div>
    										</td>
                                              <script>
                                                $('#start_time').timepicker();
                                                $('#end_time').timepicker();
                                            </script>
    									</tr>
    									<tr>
    									  <td>ห้องเรียน</td>
    									  <td><input type="text" name="room_id" value=""></td>
    									</tr>
    									<tr>
    										<td>อาคาร</td>
    										<td>
    											<select class="ui fluid dropdown">
    												<option value="1">1</option>
    												<option value="2">2</option>
    												<option value="3">3</option>
    												<option value="4">4</option>
    											</select>
    										</td>``
    									</tr>
    									<tr>
    										<td>หมายเหตุ</td>
    										<td><input type="text" name="note"></td>
    									</tr>

    								</tbody>
    							</table>
                                <button class="ui button" type="submit">ยืนยัน</button>

    						</form>

                            <script>
                            $('.ui.search')
                              .search({
                                apiSettings: {
                                  metadata: {
                                    url: '//api.github.com/search/repositories?q={query}',
                                  }
                                },
                                fields: {
                                  results : 'items',
                                  title   : 'name',
                                  url     : 'html_url'
                                },
                                minCharacters : 3
                              })
                            ;
                            </script>

    					</div>
    			</div>

    		</div>


    		</div>
    	</div>


@endsection
