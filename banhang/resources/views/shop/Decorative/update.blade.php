@extends('layouts.app')

@section('content')
<form method="post" action="">
	  <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">Số Lượng bán</label>     

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="sl" 
                                placeholder="Số Lượng Bán" 
                                >
                       @foreach($product as $product)
                    <input type="hidden" name="slco" value=" {{$product->still}}">
                   <input type="hidden" name="gt" value=" {{$product->price}}">
                   <input type="hidden" name="da" value=" {{$product->sold}}">

                     @endforeach
                            </div>
                        </div>
                         <div class="col-md-6 offset-md-4">
				        <input type="submit"  value="Cập Nhật" class="btn btn-primary">
				    </div>
                    {{ csrf_field() }}
             </div>

</form>




@endsection