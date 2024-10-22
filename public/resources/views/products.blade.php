@extends('welcome')
@section('content')   
<div class="row row-cols-1 row-cols-md-6 g-4 mt-3">
@foreach($products as $product)
        
            <div class="col">
                <div class="card h-100">
                        <img src="{{$product->foto}}" class="card-img-top" alt="нет фото" width="200px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <h5>{{$product->trade_price}}руб222222.</h5>
                            
                            
                        </div>
                        <div class="card-footer">
                            
                            <small class="text-muted">оценка 5</small>
                            <a href="#" class="btn btn-secondary btn-sm">Подробнее</a>
                        </div>
                </div>
            </div>
       
       
    @endforeach
</div>
@endsection
