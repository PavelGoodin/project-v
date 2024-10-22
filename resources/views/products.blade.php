@extends('welcome')
@section('content') 
<div class="card-deck mb-3">
@foreach($products as $product)
        
    
                <div class="card">
                        <img src="{{$product->foto}}" class="card-img-top" alt="нет фото" width="200px" height="250px">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            <span>
                            <h5>{{$product->retail_price}}</h5>
                            <img src= "{{ URL::asset('resources/img/kk.png') }}" alt="" width="40" height="40" style=" margin: 0px 0px 0px 0px">
                            </span>
                            
                        </div>
                        <div class="card-footer">
                            
                            <small class="text-muted">оценка 5</small>
                            <a href="#" class="btn btn-secondary btn-sm">Подробнее</a>
                        </div>
                </div>

           
       
       
    @endforeach
</div>
@endsection
