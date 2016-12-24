@extends('layouts.page')

@section('title')
    เพิ่มห้อง
@endsection

@section('content')
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
                <div class="ui container">
                    <div class="col-9 col-m-9">
                        <div class="ui container">
                            <div class="content" >
                                <div class="ui segment">
                                    <h2 class="ui header"><i class="configure icon"></i>แก้ไข/ยกเลิก</h2>
                                    <table class="ui celled table" style="text-align:center;">
                                        <thead >
                                            <tr>
                                                <th>เลขที่ห้อง</th>
                                                <th>ชื่อห้อง</th>
                                                <th>อาคาร</th>
                                                <th>แก้ไข</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($rooms->count() > 0)

                                                @foreach($rooms as $room)
                                                    <tr>
                                                        <td>{{ $room->room_id }}</td>
                                                        <td>{{ $room->room_name }}</td>
                                                        <td>{{ $room->build }}</td>
                                                        <td><a href="{{ url('booking/edit/'.$room->room_id) }}"><i class="configure icon"></i></a></td>
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
