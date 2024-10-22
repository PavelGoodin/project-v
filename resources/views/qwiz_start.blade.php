@extends('welcome')
@section('content') 
<div class="jumbotron" align="center">
    <h1 class="display-4" align="center">Добро пожаловать на наш, МЕГА-КВИЗ!</h1>
    
    
    <img src="{{ URL::asset('resources/img/qwiz.jpg') }}" class="img-thumbnail" alt="нет фото" >
<hr class="my-4">

<p class="lead">Отвечай на вопросы и получай игровую валюту "Карма"!</p>
<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Выбери тему!
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Тема1</a></li>
    <li><a class="dropdown-item" href="#">Тема2</a></li>
    <li><a class="dropdown-item" href="#">Тема3</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Общая тема</a></li>
  </ul>
</div>

    <hr class="my-4">
    <p>Прокачай свои мозги!</p>
    <p class="lead">
        @guest
        <p class="hint">Для старта игры необходимо авторизоваться!</p>
        <a class="btn btn-primary btn-lg" href="http://a0894342.xsph.ru/login" role="button">Вход!</a>
        @else
      <a class="btn btn-primary btn-lg" href="http://a0894342.xsph.ru/games/gwizle/1" role="button">Старт!</a>
        @endguest
    </p>
  </div>
  @endsection