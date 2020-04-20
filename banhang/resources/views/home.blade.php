@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Tổng Nhập  Hàng  : {{number_format($tongnhap,0,',','.')}} VNĐ </h1>
  <h1>Tổng Thu Về  :  {{number_format($tongthu,0,',','.')}} VNĐ</h1>
    <h1>Tổng số lượng bán :  {{$tongban}} cái</h1>
    <h1>Số Lượng Lấy Hàng  : {{$sl}} cái</h1>
      <h1>Còn  Hàng  : {{$sl - $tongban}} cái</h1>
      <form method="post">
      	<button type="submit" class="btn btn-primary">Cập Nhật</button>
 {{csrf_field()}}
      </form>
</div>

<table class="table table-bordered" style="margin-top:20px;">               
<thead>
    <tr class="bg-primary">
        <th width="20%">Ngày</th>
        <th width="10%">Tổng Nhập  Hàng</th>
        <th width="20%">Tổng số lượng bán   </th>
        <th width="10%">Số Lượng Lấy Hàng </th>
        <th width="7%">Tổng Thu Về </th>
        <th width="7%">Còn  Hàng</th>
      

        
    </tr>
</thead>
<tbody>
   @foreach($product as $product)
   <tr>
   	  	<td> {{$product->time_ban}}</td>
   	  	<td>{{number_format($product->tongnhap,0,',','.')}}VND</td>
   	  	<td> {{$product->sl_ban}}</td>
   	  	<td> {{$product->sl_nhap}}</td>
   	  	<td> {{number_format($product->tongban,0,',','.')}}VND</td>
   	  	<td> {{$product->con_hang}}</td>
   </tr>
   
    @endforeach
</tbody>
</table>
@endsection
