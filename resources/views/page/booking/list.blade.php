@extends('layouts.page')

@section('title')
    จองห้อง
@endsection

@section('content')
    <div class="row">

        @include('layouts._partial.side-menu')

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
                <div class="ui container">
                    <div class="col-9 col-m-9">
                        <div class="ui container">
                            <div class="content" >
                                <div class="ui segment">
                                    <h2 class="ui header"><i class="configure icon"></i>แก้ไข/ยกเลิก</h2>
                                    <table class="ui celled table" style="text-align:center;">
                                        <thead >
                                            <tr>
                                            <!-- <tr class="ui inverted grey table"> -->
                                                <th>ลำดับ</th>
                                                <th>เวลา</th>
                                                <th>วันที่</th>
                                                <th>รหัสวิชา</th>
                                                <th>ชื่อวิชา</th>
                                                <th>ห้องเรียน</th>
                                                <th>หมายเหตุ</th>
                                                <th>แก้ไข</th>
                                                <th>ยกเลิก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($data['booking']->count() > 0)

                                                @foreach($data['booking'] as $booking)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $booking->time }}</td>
                                                        <td>{{ $booking->date }}</td>
                                                        <td>{{ $booking->subject->subject_id }}</td>
                                                        <td>{{ $booking->subject->subject_name }}</td>
                                                        <td>{{ $booking->room_name}}</td>
                                                        <td>{{ $booking->note }}</td>
                                                        <td><a href="{{ url('booking/edit/'.$booking->entity_id) }}"><i class="configure icon"></i></a></td>
                                                        <td><a href=""><i class="remove circle icon" onclick="myFunction()"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                </div>

    		</div>
    		</div>
    	</div>


@endsection
