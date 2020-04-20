@extends('layouts.app')

@section('content')
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên Món</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name_mon" required>
   
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Thành Phần </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name_tp" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ảnh :</label>
    <input type="file" name="file" class="form-control" required>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Loại Món</label>
     <select required name="name_loai" class="form-control" required>
        @foreach($loai as $co)
        <option value="{{$co->id_loai}}">{{$co->tenloai}}</option>
            @endforeach

    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Số Lượng</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="name_sl" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giá trị</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="name_gt" required>
   
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
 {{csrf_field()}}
</form>
@endsection