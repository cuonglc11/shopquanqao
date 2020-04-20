@extends('layouts.app')

@section('content')
<div class="container">
  <form method="post">
     @foreach($data as $data )
     <h3>{{$data->cauhoi}}</h3>
    
    <input type="radio" id="male" name="{{$data->id}}" value="{{$data->c1}}">
     <label for="male">{{$data->c1}}</label><br>
     <input type="radio" id="male" name="{{$data->id}}" value="{{$data->c2}}">
     <label for="male">{{$data->c2}}</label><br>
     <input type="radio" id="male" name="{{$data->id}}" value="{{$data->c3}}">
     <label for="male">{{$data->c3}}</label><br>
     <input type="hidden" name="id" value="{{$data->id}}">
     <input type="hidden" name="dapan" value="{{$data->c1}}">

     
     @endforeach
       <button type="submit" class="btn btn-primary">Trả Lời</button>
 {{csrf_field()}}
  </form>
</div>
@endsection
