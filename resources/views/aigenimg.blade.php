@extends('welcome')
@section('content') 
<div class="jumbotron">
    
        @guest
        <p class="hint">Для старта генерации картинок необходимо авторизоваться!</p>
        <a class="btn btn-primary btn-lg" href="http://a0894342.xsph.ru/login" role="button">Вход!</a>
        @else
      
           
    
<form method="POST" action="{{ route('sendpromtgenimg') }}">

@csrf <!-- {{ csrf_field() }} -->
    <h1 class="display-4">Привет, Друг!</h1>
    <p class="lead">Попробуй сотворить что-то необычное!</p>
    <div class="loader" id="loading_id">идет генерация...</div>
    <hr class="my-4">


    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Промт:</span>
    <input type="text" class="form-control" name="promt_message" placeholder="{{$placeholder}}" aria-label="promt" aria-describedby="basic-addon1">
    <input type="hidden" name="placeholder"  value="{{$placeholder}}">
    </div>
    <div>    <span class="input-group-text" id="basic-addon2">Seed:</span>
    <input type="text" class="form-control" name="seed" placeholder="{{$seed}}" aria-label="promt" aria-describedby="basic-addon2">
    </div>
    <p>Каждый запрос расходует 1 карму!</p>
    
    <p class="lead">
      <button type="submit" class="btn btn-primary btn-lg"  id="subbutton" onClick="pressButton()" role="button">==Отправить==</button>
        
    </p>
     
</form>

  </div>
  <div class="jumbotron">
 
  
  
  <img src="{{$path_img}}" class="img-good" alt="нет фото" >

  </div>
  
  @endguest 
  
  
  @endsection