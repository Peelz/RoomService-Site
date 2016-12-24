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

    <script type="text/javascript" src="{{ asset('/semantic-ui-daterangepicker/moment.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/semantic-ui-daterangepicker/daterangepicker.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/semantic-ui-daterangepicker/daterangepicker.css')}}" />



@endpush
@section('title')
    ส่งออกข้อมูล
@endsection

@section('content')

    <div class="ui container">
        <div class="content">
            <div class="ui segment">
                <form class="ui form" action="{{ url('export/download')}} " method="POST">
                    {{ csrf_field() }}
                    <h2 class="ui header"><i class="file icon"></i>ส่งออกข้อมูล</h2>
                    <div class="fields">
                        <div class="six wide field">
                            <div class="ui radio checkbox" id="current">
                              <input type="radio" name="type" checked="" tabindex="0" class="hidden" value="current">
                              <label>เดือนปัจจุบัน</label>
                            </div>
                        </div>

                    </div>

                    <div class="fields">
                        <div class="four wide field">
                            <div class="ui radio checkbox" >
                              <input type="radio" name="type" tabindex="0" class="hidden" value="passed">
                              <label for="monthSelect">เดือนก่อนหน้า</label>
                            </div>
                        </div>
                        <div class="six wide field">
                          <div class="ui selection disabled dropdown opt" id="passed">
                              <input type="hidden" name="val1">
                              <i class="dropdown icon"></i>
                              <div class="default text">เลือกเดือนที่ต้องการ</div>
                              <div class="menu">
                              </div>
                          </div>
                        </div>

                    </div>

                    <div class="fields">
                        <div class="four wide field">
                            <div class="ui radio checkbox">
                              <input type="radio" name="type" tabindex="0" class="hidden" value="duration">
                              <label  for="monthDuration">กำหนดช่วงเวลาเอง</label>
                            </div>
                        </div>
                        <div class="six wide field">
                          <div class="ui input disabled opt" id="duration">
                              <input type="text" name="val2" placeholder="เลือกช่วงเวลาที่ต้องการ">
                          </div>
                        </div>

                    </div>
                    <button class="ui button" >ดาวน์โหลด </button>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('input[name="val2"]').daterangepicker({
            format: 'YYYY-MM-DD',

        });

        var html = "";
        var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
        "เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
        "ตุลาคม","พฤศจิกายน","ธันวาคม");

        for (i=0;i<{{ $date->month }};i++){
            html += "<div class='item' data-value="+(i+1)+">"+thmonth[i]+"</div>"
        }
        $('#passed').find('.menu').append(html);


        $('.ui.radio.checkbox').checkbox({
            onChange: function(){
                value = $(this).val();
                $('.opt').addClass('disabled');
                $("#"+value).removeClass('disabled');
                // console.log( $(this).parent() );
            }
        });

        $('.selection.dropdown').dropdown();
    </script>

@endsection
