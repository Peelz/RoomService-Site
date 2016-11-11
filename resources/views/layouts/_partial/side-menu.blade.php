@if (count($errors) > 0)

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach
@endif
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
		<div class="card">
			  <!-- <img class="card-img-top" src="BG/woman.png" alt="Card image cap"> -->
			  <div class="card-block">
				<h4 class="card-title">ยินดีต้อนรับเข้าสู่ระบบ</h4>
				<p class="card-text">{{ Auth::user()->firstname }}</p>
			  </div><br>
			  <ul class="list-group list-group-flush">
				<li class="list-group-item">
					<a href="{{ url('/me/edit') }}" class="item ">แก้ไขข้อมูลส่วนตัว</a>
				</li>
				<li class="list-group-item">
					<a href="{{ url('/booking/form')}}" class="item ">ขอใช้ห้อง</a>
				</li>
				<li class="list-group-item">
					<a href="{{ url('/booking/list')}}" class="item ">ประวัติการจองห้อง</a>
				</li>
				<li class="list-group-item">
					<a href="room-request.html" class="item ">เพิ่มห้อง</a>
				</li>
				<li class="list-group-item">
					<a href="room-request.html" class="item ">เพิ่มวิชา</a>
				</li>

				<li class="list-group-item">
					<a href="{{url('/')}}" class="item">กลับไปหน้าแรก</a>
				</li>
				<li class="list-group-item">
					<a href="{{url('/logout')}}" class="item"><i class="sign out icon"></i>ออกจากระบบ</a>
				</li>
			  </ul>
		</div>
	</div>
@endif
