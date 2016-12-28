@extends('layouts.page')

@section('title')
    จองห้อง
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
                <div class="content" >
                    <div class="ui segment">
                        <h2 class="ui header"><i class="configure icon"></i>แก้ไข/ยกเลิก</h2>
                        <span class="ui right floated"> จำนวนการจองทั้งหมด <b>{{ $data['booking']->total() }}</b> คร้้ง </span>
                        <table class="ui celled table" style="text-align:center;">
                            <thead >
                                <tr>
                                <!-- <tr class="ui inverted grey table"> -->
                                    <th>ลำดับ</th>
                                    <th>เวลาที่จอง</th>
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
                                    @foreach($data['booking'] as $key => $booking)
                                        <tr>
                                            <td> {{$key+1}} </td>
                                            <td>{{ $booking->time }}</td>
                                            <td>{{ $booking->date }}</td>
                                            @if(is_null($booking->section ))
                                                <td> - </td>
                                                <td> - </td>
                                            @else
                                                <td>{{ $booking->section->subject->subject_id }}</td>
                                                <td>{{ $booking->section->subject->subject_name }}</td>
                                            @endif
                                            <td>{{ $booking->room_name}}</td>
                                            <td>{{ $booking->note }}</td>
                                            <td><a href="{{ url('booking/edit/'.$booking->entity_id) }}"><i class="configure icon"></i></a></td>
                                            <td><a href=""><i class="remove circle icon" onclick="myFunction()"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>

                            @if( $data['booking']->total() > $data['booking']->perPage() )
                                <tfoot>
                                    <tr>
                                        <th colspan="9">
                                          <div class="ui right floated pagination menu">
                                            <a class="icon item" href="{{ $data['booking']->previousPageUrl() }}"><i class="left chevron icon"></i> </a>
                                              @for($i=1; $i <= $data['booking']->lastPage() ; $i++)
                                                  <a href=" {{ url('booking/list/?page=').$i }}" class="item {{ $i==$data['booking']->currentPage()? "active":"" }}"> {{ $i }}</a>
                                              @endfor
                                            <a class="icon item" href="{{ $data['booking']->nextPageUrl() }}"><i class="right chevron icon"></i></a>
                                          </div>
                                        </th>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>


    		</div>
    		</div>
    	</div>


@endsection
