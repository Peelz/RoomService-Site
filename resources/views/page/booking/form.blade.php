
@section('title')
    จองห้อง
@endsection

@section('main-content')
    <form action="post">
        <input type="text" name="sec" placeholder="Section">
        <input type="number" name="quan_nisit" value="">
        <input type="text" name="date" value="">

        <input type="time" name="start_time" value="">
        <input type="time" name="end_time" value="">
        <input type="text" name="room" value="">
        <textarea name="note" rows="8" cols="40"></textarea>
    </form>

@endsection
