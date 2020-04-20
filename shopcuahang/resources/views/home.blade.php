@extends('layouts.app')

@section('content')
<div class="container">
   @foreach($data as $data )
 <a href="{{ url('/listmon/'.$data->id_Ban) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit">{{$data->name_ban}}</span> </a>
 @endforeach
</div>
@endsection
