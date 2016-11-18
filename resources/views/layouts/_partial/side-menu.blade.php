@if (count($errors) > 0)

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach
@endif
@push('addPlugin')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/sidebar.min.css')}}">

@endpush
@if(!Auth::check())
	<div class="col-3 col-m-3 menu">
	  <ul>
		<form action="{{ url('login') }}" class="ui form" method="post">
			{{ csrf_field() }}

		  <div class="field"><label for=""><br>ID :</label><input type="text" name="user_id"></div>
		  <div class="field"><label for="">Password :</label><input type="password" name="password"></div>
		  <div class="inline field">
			  <div class="ui checkbox">
				 <input type="checkbox" tabindex="0" name="remember_me">
				 <label>จดจำรหัสผ่าน</label>
			  </div>
			   <button class="ui green button" type="submit">เข้าสู่ระบบ</button>

		  </div>
		</form>
	  </ul>
	</div>


@else
	<div class="col-3 col-m-3 menu">
		<ul>
			<h4 class="ui left aligned header"><br>&nbsp;&nbsp;&nbsp;ยินดีต้อนรับเข้าสู่ระบบ..</h4>
			<p class="ui left aligned text-align">{{ Auth::user()->full_name }}</p>

          <li class="dropdown">
            <a href="#" data-toggle="dropdown"class="item "><i class="write icon"></i>แก้ไขข้อมูลส่วนตัว</a>
          </li>

          <li class="dropdown">
            <a href="#" data-toggle="dropdown"class="item "><i class="building icon"></i>ขอใช้ห้องแล็บ <i class="icon-arrow"></i></a>
              <ul class="dropdown-menu">
              <li><a href="{{ route('booking.create')}}"class="item "><i class="pointing up icon"></i>จองห้องแล็บ</a></li>
              <li><a href="{{ route('booking.list')}}"class="item "><i class="configure icon"></i>แก้ไขการจองห้อง</a></li>
              </ul>
          </li>

          <li class="dropdown">
            <a href="#" data-toggle="dropdown"class="item "><i class="add circle icon"></i>เพิ่มห้องแล็บ<i class="icon-arrow"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#"class="item "><i class="pointing up icon"></i>เพิ่มห้องแล็บ</a></li>
              <li><a href="#"class="item "><i class="configure icon"></i>แก้ไขการเพิ่มห้อง</a></li>
              <li><a href="#"class="item "><i class="remove circle icon"></i>ยกเลิกการเพิ่มห้อง</a></li>
              </ul>
          </li>
            <li class="dropdown">
            <a href="{{ url('/logout')}}" data-toggle="dropdown"class="item "><i class="sign out icon"></i>ออกจากระบบ </a>
            </li>

          <!--dropdown-->
          <script src="{{ asset('css/room')}}.js"></script>
			</ul>
	</div>

@endif
