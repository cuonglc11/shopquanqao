@extends('layouts.app')

@section('content')
  <a href="{{ url('/createlongdress')}}" class="btn btn-primary stretched-link">Thêm hàng</a>

<table class="table table-bordered" style="margin-top:20px;">               
<thead>
    <tr class="bg-primary">
        <th width="10%">Tên Áo</th>
        <th width="10%">Giá</th>
        <th width="10%">Ảnh</th>
        <th width="10%">Màu</th>
        <th width="10%">Size</th>
        <th width="7%">Số Lượng</th>
        <th width="7%">Tổng tiền</th>
        <th width="7%">Đã bán</th>
        <th width="7%">Còn Hàng</th>
        <th width="7%">Thu  về</th>
        <th width="30%">Chức Năng</th>

        
    </tr>
</thead>
<tbody>
  @foreach($product as $product)
   <tr>
   	<td> {{$product->name_longdress}}</td>
   	<td>{{number_format($product->picre_longdress,0,',','.')}}VND</td>
   	<td>
		<img src="{{asset('img/'.$product->pic_longdress)}}" height="90px">
	</td>
	<td>
		<div style="background-color: {{$product->code_color}};width: 76px;height: 69px;"></div>
	</td>
	<td>{{ $product->name_size }}</td>
	<td>{{ $product->soluong_longdress }}</td>
	 	<td>{{number_format($product->tongtien_longdress,0,',','.')}}VND</td>
    <td>{{ $product->daban_longdress }}</td>
    <td>{{ $product->conhang_longdress}}</td>
    	<td>{{number_format($product->thu_longdress,0,',','.')}}VND</td>
    <td>
    	<a href="{{  url('/updatelong/'.$product->id_longdress ) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Cập nhập hàng</a>
    	<br>
    	<a href="{{  url('/edit/'.$product->id_longdress ) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> sửa thông tin</a>
       <a href="{{  url('/deletelong/'.$product->id_longdress) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa hàng này?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
    </td>
   </tr>
   


   @endforeach
</tbody>
</table>
Tổng Tiền Lấy Hàng : {{number_format($nhap_hang,0,',','.')}} VNĐ <br>
Tổng tiền thu về : {{number_format($thu_ve,0,',','.')}} VNĐ <br>

@endsection