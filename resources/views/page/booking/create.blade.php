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
    						<form action="{{ url('booking/create')}}" method="post" class="ui form" id="booking-form">
                                {{ csrf_field() }}

    							<h2 class="ui header"><i class="building icon"></i>ขอใช้ห้องแล็บ</h2>
    							<table class="ui definition table" >
    							  	<tbody >

    									<tr>
    									  <td>วิชา</td>
    									  <td>
                                              {{-- <div class="ui search" id="subject-input">
                                                  <div class="ui icon input">
                                                    <input class="prompt" type="text" name="subject" placeholder="ค้นหาวิชา">
                                                    <i class="search icon"></i>
                                                  </div>
                                              </div> --}}

                                              <div class="ui  search selection  dropdown" id="subject-input">

                                                    <input type="hidden" name="subject" >
                                                    <i class="search icon"></i>
                                                    <div class="default text">ค้นหาวิชา</div>
                                              </div>
                                          </td>
    									</tr>

    									<tr>
    									  <td>หมู่เรียน</td>
    									  <td>
                                              {{-- <div class="ui selection dropdown" id="section-input">
                                                <input type="hidden" name="sec">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">เลือกเซค</div>
                                                <div class="menu">
                                                    <div class="item">1</div>
                                                    <div class="item">2</div>
                                                </div>

                                              </div> --}}
                                              <div class="ui  search selection  dropdown" id="section-input">

                                                    <input type="hidden" name="sec" >
                                                    <i class="dropdown  icon"></i>
                                                    <div class="default text">เลือกหมู่เรียน</div>
                                              </div>
                                          </td>
    									</tr>
    									<tr>
    									  <td>ผู้สอน</td>
    									  <td>
                                              <div class="ui search selection  dropdown" id="instructor-input">

                                                  <input type="hidden" name="instructor" >
                                                  <i class="dropdown  icon"></i>
                                                  <div class="default text">เลือกผู้สอน</div>


                                              </div>
                                          </td>
    									</tr>
                                        <tr>
                                          <td>ผู้จอง</td>
                                          <td>
                                            {{ Auth::user()->full_name}}
                                          </td>
                                        </tr>
    									<tr>
    										<td>จำนวนคน</td>
    										<td>
                                                <div class="ui right labeled input">
    												  <input type="text" name="quantity_nisit" placeholder="">
    												  <div class="ui label">
    													  คน
    													</div>
												</div>
    										</td>
    									</tr>
    									<tr>
    										<td>วันที่</td>
    										<td>
                                                <div class="ui icon input">
    											<input id="date" type="text" name="date" >
    											<i class="calendar Outline icon"></i>

    										    </div>
                                            </td>

    									</tr>
    									<tr>
    									<td>เวลา</td>
    										<td >
                                                <div class="eight fields">
                                                    <input type="hidden" id="start_time" name="start_time" >

                                                    <div class="field" >
                                                        <select class="ui search  dropdown" type="text" name="start_time_hour" style="text-indent: 5px;">
                                                            @for($i=7; $i <= 20 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="field">
                                                        <select class="ui search  dropdown" type="text" name="start_time_min">
                                                            <option value="00">00</option>
                                                            <option value="30">30</option>
                                                        </select>
                                                    </div>
                                                    <span style="padding: 7px 0 ;"> ถึง </span>
                                                    <input type="hidden" id="end_time" name="end_time" >

                                                    <div class="field" >
                                                        <select class="ui search  dropdown" type="text" name="end_time_hour" style="text-indent: 5px;">
                                                            @for($i=7; $i <= 20 ; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="field">
                                                        <select class="ui search  dropdown" type="text" name="end_time_min">
                                                            <option value="00">00</option>
                                                            <option value="30">30</option>

                                                        </select>
                                                    </div>
                                                </div>

    										</td>

    									</tr>
                                        {{-- <tr>
                                            <td>อาคาร</td>
                                            <td>
                                                <div class="ui input" id="build-input">
                                                    <input type="text" name="build" value="">
                                                </div>
                                            </td>
                                        </tr> --}}
    									<tr>
    									  <td>ห้องเรียน</td>
    									  <td>
                                              <div class="ui input" id="room-input">
                                                  <input type="text" name="room" value="">
                                              </div>
                                          </td>
    									</tr>

    									<tr>
    										<td>หมายเหตุ</td>
    										<td>
    										    <textarea name="note" rows="4" cols="40"></textarea>
    										</td>
    									</tr>

    								</tbody>
    							</table>
                                <button class="ui button" type="button" id="checking">ตรวจสอบ </button>
                                <div class="alert-box">

                                </div>
                                <div class="option">
                                    <div class="ui grid">
                                        <div class="row">
                                            <div class="one wide column">
                                            </div>
                                        <div class="two wide column">
                                            <p>อุปกรณ์พื้นฐาน : </p><br><br><br><br><br><br><br><br><br><p>อุปกรณ์อื่นๆ : </p>
                                        </div>
                                        <div class="five wide column">
                                            <div class="ui checked checkbox ">
                                                  <input type="checkbox" checked="" name="opt_computer">
                                                  <label>เครื่องคอมพิวเตอร์</label>
                                            </div><br><br>
                                            <div class="ui checkbox checked">
                                                  <input type="checkbox" checked="" name="opt_wired_microphone">
                                                  <label>ไมโครโฟนแบบมีสาย</label>
                                            </div><br><br>
                                            <div class="ui checkbox checked">
                                                  <input type="checkbox" checked="" name="opt_television">
                                                  <label>จอรับภาพ</label>
                                            </div><br><br>
                                            <div class="ui checkbox checked">
                                                  <input type="checkbox" checked="" name="opt_vga_cable">
                                                  <label>สายต่อ Notebook-LCD</label>
                                            </div><br><br><br>
                                            <div class="ui checkbox"
                                                  <input type="checkbox" checked="" name="ex_opt_wireless_microphone">
                                                  <label>ไมโครโฟนไร้สายแบบมือถือ</label>
                                            </div>
                                        </div>
                                        <div class="five wide column">
                                            <div class="ui checkbox checked">
                                              <input type="checkbox" checked="" name="opt_projector">
                                              <label>เครื่องฉายภาพ LCD</label>
                                            </div><br><br>
                                            <div class="ui checkbox checked">
                                              <input type="checkbox" checked="" name="opt_visual_presentation">
                                              <label>เครื่องนำเสนอภาพโปร่งแสง - ทึบแสง</label>
                                            </div><br><br>
                                            <div class="ui checkbox checked">
                                              <input type="checkbox" checked="" name="opt_speaker_and_microphone">
                                              <label>เครื่องขยายเสียงพร้อมไมโครโฟน</label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="ui grid">
                                        <div class="row">
                                            <div class="one wide column">
                                            </div>
                                            <div class="two wide column">
                                                <p>เพิ่มเติม : </p>
                                            </div>
                                            <div class="nine wide column">
                                                <div class="ui form">
                                                  <div class="field">
                                                    <textarea rows="2" name="opt_note"></textarea>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="ui button" type="submit">ยืนยัน</button>
                                </div>
				    	</div>

					</form>

    					</div>
    			</div>

		</div>
        <script type="text/javascript">
            $('#date').daterangepicker({
                format: 'YYYY-MM-DD',
                singleDatePicker: true,
                showDropdowns: true

            });
        </script>
        <script type="text/javascript">
        function ErrorsMessage(data){
            var html = "" ;
            $.each(data, function(i, item) {
                if(i != 'undefined' ){

                    html = html + '<li>'+item+'</li>';

                }
            })

            return html;
        };

        function newErrorUi(el) {
            var html = '<div class="ui error message">'+
              '<i class="close icon"></i>'+
              '<div class="header">'+
                'มีบางอย่างผิดพลาด'+
              '</div>'+
              '<ul class="list">'+
                el+
              '</ul>'+
            '</div>';
            return html ;
        };

        $('#checking').click(function(){
            var $form = $('#booking-form') ;
            $form.submit(function(){
                $('input[name=start_time]').val($form.find( "select[name='start_time_hour']" ).val()+":"+$form.find( "select[name='start_time_min']" ).val());
                $('input[name=end_time]').val($form.find( "select[name='end_time_hour']" ).val()+":"+$form.find( "select[name='end_time_min']" ).val());
                return true;
            });
            $.get('{{ url('/booking/check')}}',{
                date: $form.find( "input[name='date']" ).val(),
                start_time: $form.find( "select[name='start_time_hour']" ).val()+":"+$form.find( "select[name='start_time_min']" ).val() ,
                end_time: $form.find( "select[name='end_time_hour']" ).val()+":"+$form.find( "select[name='end_time_min']" ).val() ,
                room: $form.find( "input[name='room']" ).val(),

            })
            .success(function(data){
                // console.log(data);
                if(data['reply'] == 'Allow' ){
                    $('.ui.error.message').remove() ;
                    $('#booking-form .option').addClass('active');
                }
                else{
                    // alert('กรุณากรอกข้อมูลให้ถูกต้อง');
                    inner = ErrorsMessage(data['errors']);
                    error_ui = newErrorUi(inner) ;

                    $('.ui.error.message').remove() ;
                    $('#main-container').before(error_ui);

                    $('#booking-form .option').removeClass('active');
                    $('.message .close')
                      .on('click', function() {
                        $(this)
                          .closest('.message')
                          .transition('fade')
                        ;
                      })
                    ;

                }
            })
        });
        var subjectId;
        var selection ;
        // var sections = [{"sec":"800","start_time":"8","end_time":"10","room":"Lab CE","capacity":40,"instructor_id":68,"subject_id":17},{"sec":"830","start_time":"13","end_time":"16","room":"Lab CE","capacity":40,"instructor_id":68,"subject_id":17}];
        var instructor;
          $('#subject-input').dropdown({
              apiSettings: {
                url: '{{ url('api/search/subject/') }}?name={query}'
              },
            //   type: 'category',
              fields:{
                  name: 'name',
                  value: 'id',
                  text: 'name',
              },
              fullTextSearch: true,
              showNoResults : true,
              saveRemoteData: false,
              onChange: function(value, text, $choice){
                  subjectId = value;
                  $('#section-input').dropdown('clear');
                  $('#instructor-input').dropdown('clear');

              },
              error:{
                  noResults : "ไม่พบรายวิชา"
              }

            });


            $('#section-input').on('click',function(){
                $('#section-input').dropdown({
                    apiSettings: {
                      url: '{{url('/api/search/section/?q=')}}'+subjectId
                  },
                  onChange: function(value, text, $choice){
                      section = value;
                  },
                  fields:{
                      name: 'sec',
                      value: 'sec',
                      text: 'sec',

                  },
                  minCharacters: 0,
                });
            });

            $('#instructor-input').on('click',function(){

                $('#instructor-input').dropdown({
                    apiSettings: {
                      url: '{{url('/api/search/instructor/?sub=')}}'+subjectId+'&sec='+section
                  },
                  fullTextSearch: true,
                 // showOnFocus : true,
                 debug: false,
                 saveRemoteData: false,
                 fields: {
                     name : 'name',
                     value : 'id',
                     text : 'name'
                 }

                });

            });




        </script>

@endsection
