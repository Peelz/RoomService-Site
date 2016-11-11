@extends('layouts.page')

@push('addPlugin')
    <link rel="stylesheet" href="/timerpicker/include/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <link rel="stylesheet" href="/timerpicker/jquery.ui.timepicker.css?v=0.3.3" type="text/css" />

    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.widget.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.tabs.min.js"></script>
    <script type="text/javascript" src="/timerpicker/include/ui-1.10.0/jquery.ui.position.min.js"></script>

    <script type="text/javascript" src="/timerpicker/jquery.ui.timepicker.js?v=0.3.3"></script>

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

    							<h2 class="ui header"><i class="building icon"></i>รายงานประวัติการจองห้อง</h2>
    							<table class="ui celled table" >
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
                                        @if( $data['booking'] )
                                            @foreach($data['booking'] as $booking )
                                                <tr>
                                                    <td>{{ $booking->start_time.' - '.$booking->end_time}}</td>
                                                    <td>{{ $booking->room->room_id }}</td>
                                                    <td>{{ $booking->room->build }}</td>
                                                    <td>{{ $booking->user->user_id }}</td>
                                                    <td>{{ $booking->subject->sub_id }}</td>
                                                    <td>{{ $booking->subject->name}}</td>
                                                    <td>{{ $booking->sec}}</td>
                                                    <td>{{ $booking->note}}</td>
                                                </tr>
                                            @endforeach
                                        @endif

    								</tbody>
    							</table>

    						</form>

    					</div>
    			</div>

    		</div>


    		</div>
    	</div>


@endsection
