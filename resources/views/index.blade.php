<html>
<form enctype="multipart/form-data" method="POST" action="{{url('member')}}">
<input type="text" name="Nama">
<input type="text" name="Email">
<input type="text" name="Sex">
<input type="file" class="form-control" name="Picture" required>  
<button type="submit">hahaha</button>
</form>
@foreach($member as $value)
    <img src="{{asset('images/'.$value->Picture)}}">
@endforeach
</html>
