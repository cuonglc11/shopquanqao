@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    
  	@foreach($data as $data)
  	<form method="post">
  		 <div class="col-sm-3">
     <img src="{{asset('img/'.$data->pic_mon)}}">
     <h1>{{$data->name_mon}}</h1>
     <td>{{number_format($data->picre_mon,0,',','.')}}VND</td> <br>
    
    </div>
     <button type="submit" class="btn btn-primary">Đặt Món</button>
 {{csrf_field()}}
  	</form>
   
    @endforeach

  </div>
</div>
@endsection