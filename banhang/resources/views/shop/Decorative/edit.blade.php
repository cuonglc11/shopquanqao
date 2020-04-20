@extends('layouts.app')

@section('content')
<form method="POST" enctype="multipart/form-data">
	 @foreach($product as $product)
  <div class="form-group">
    <label for="exampleInputEmail1">Tên hoa</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product->name_flower}}" name="name_Hoa" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Ảnh :</label>
    <input type="file" name="file" value="{{$product->pic_flower}}" class="form-control" >
   	<img src="{{asset('img/'.$product->pic_flower)}}" height="90px">

  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Màu</label>
     <select required name="color_db" class="form-control" required>
        @foreach($color as $co)
        <option value="{{$co->id_color}}">{{$co->name_color}}</option>
            @endforeach

    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Số Lượng</label>
    <input type="number" class="form-control" value="{{$product->soluong}}" id="exampleInputEmail1" name="sl" required>
   
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Giá trị</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="picre" value="{{$product->price}}" required>
   
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
 {{csrf_field()}}
 @endforeach
</form>
@endsection