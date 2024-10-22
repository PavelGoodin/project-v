@extends('welcome')
@section('content') 
<div class="jumbotron">
    
        @guest
        <p class="hint">Для старта игры необходимо авторизоваться!</p>
        <a class="btn btn-primary btn-lg" href="http://a0894342.xsph.ru/login" role="button">Вход!</a>
        @else
      
           
    
<form method="POST" action="{{ route('sendpromtaibot') }}">

@csrf <!-- {{ csrf_field() }} -->
    <h1 class="display-4">Привет, Друг!</h1>
    <p class="lead">Задай свой вопрос нашему мастеру Фу!</p>
    <hr class="my-4">




  
  <audio controls autoplay>
  
  <source src="resources/audio/speech{{$seed}}.mp3" type="audio/mp3">
  
    Ваш браузер не поддерживает встроенное аудио
  </audio>



    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Запрос:</span>
    <input type="text" class="form-control" name="promt_message" placeholder="{{$placeholder}}" aria-label="promt" aria-describedby="basic-addon1">
    <input type="hidden" name="placeholder"  value="{{$placeholder}}">
    </div>
    <p>Каждый запрос расходует 1 карму!</p>
    
    <p class="lead">
      <button type="submit" class="btn btn-primary btn-lg"  id="subbutton" onClick="pressButton()" role="button">==Отправить==</button>
        
    </p>
</form>
  </div>
  <div class="jumbotron">
      
<img src="{{ URL::asset('resources/img/master.png') }}" class="img-thumbnail" alt="нет фото" align="right" >
 
<div class="loader" id="loading_id"></div>
  {{$result}}

  </div>
  
  @endguest 
  
  
  @endsection