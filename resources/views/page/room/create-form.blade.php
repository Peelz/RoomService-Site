@extends('layouts.page')
@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />

@endpush
@push('addPlugin')
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
    {{-- <script src="{{ asset('js/api/booking-search.js')}}" charset="utf-8"></script> --}}
    <script type="text/javascript" src="{{ asset('/semantic-ui-daterangepicker/moment.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/semantic-ui-daterangepicker/daterangepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/semantic-ui-daterangepicker/daterangepicker.css')}}" />

@endpush
@section('title')
    จองห้อง
@endsection

@section('content')
    <!-- ส่วนเมนูข้างๆ -->
        <div class="row">

    <!-- ส่วนขอใช้งาน -->
            @if (count($errors) > 0)
                <div class="ui error message">
                  <i class="close icon"></i>
                  <div class="header">
                    พบข้อผิดพลาด
                  </div>
                  <ul class="list">
                    @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach
                    </ul>
                  </div>
            @endif

            @if( isset($messages))
                <div class="ui success message">
                  <i class="close icon"></i>
                  <div class="header">
                    {{ $messages }}
                  </div>
                  <p>{{ 'บันทึกข้อมูลเรียบร้อย' }}</p>
                </div>
            @endif
			<div class="ui container" id="main-container">
				<div class="content" >
					<div class="ui segment">
						<form action="{{ url('room/create')}}" method="post" class="ui form" id="booking-form">
                            {{ csrf_field() }}

							<h2 class="ui header"><i class="building icon"></i>เพิ่มห้อง</h2>
							<table class="ui definition table" >
							  	<tbody >
									<tr>
									  <td>รหัสห้อง</td>
									  <td>
                                          <div class="ui search" id="subject-input">
                                              <div class="ui input">
                                                <input class="prompt" type="text" name="room_id" placeholder="ตัวอย่าง : 15300">
                                              </div>
                                          </div>
                                      </td>
									</tr>
									<tr>
										<td>ชื่อห้อง</td>
										<td>
                                            <div class="ui input">
												  <input type="text" name="room_name" placeholder="ตัวอย่าง : Lab Com4">
											</div>
										</td>
									</tr>
									<tr>
										<td>อาคาร</td>
										<td>
                                            <div class="ui input">
											<input id="date" type="text" name="build" placeholder="15,17,1" >
										    </div>
                                        </td>
									</tr>
									<tr>

								</tbody>
							</table>
                            <button class="ui button" type="submit" id="checking">ตกลง </button>

			        	</form>
                    </div>
                </div>
			</div>
		</div>

@endsection
