@extends('welcome')
@section('content') 
<div class="card-group">

    
                <div class="card-body">
                    <h2 class="card-title">Шаг 1</h2>
                    <h5>Зарегистрируйся на нашем сайте и получи секретный ключ в личном кабинете!</h5>
                        <img src="{{ URL::asset('resources/img/Screenshot_8.png') }}" class="img-thumbnail" alt="нет фото" width="400" >
                            
                            <p class="card-text">Приключения в космосе!</p>
                            <span>
                            <h5>Играйте и зарабатывайте!</h5>
                           <a class="btn btn-secondary" href="https://disk.yandex.ru/d/UUS9PGFLjSYX5A" role="button">скачать</a>
                             <small class="text-muted">оценка 5</small>
                            </span>
                            
                        

                        </div>
                        
                <div class="card-body">
                    <h2 class="card-title">Шаг 2</h2>
                    <h5>Скачай игру! Зарабатывай игровую валюту Карма, выполняя различные задания!</h5>
                        <img src="{{ URL::asset('resources/img/Screenshot_2.png') }}" class="img-thumbnail" alt="нет фото"  width="400">
                            
                            <p class="card-text">Пошаговые бои(онлайн)!</p>
                            <span>
                            <h5>Играйте и зарабатывайте!</h5>
                           <a class="btn btn-secondary" href="https://disk.yandex.ru/d/UUS9PGFLjSYX5A" role="button">скачать</a>
                            <small class="text-muted">оценка 5</small>
                            </span>
                        

                        </div>
                        
                <div class="card-body">
                    <h2 class="card-title">Шаг 3</h2>
                    <h5>Потрать Карму на нужный тебе товар!</h5>
                        <img src="{{ URL::asset('resources/img/Screenshot_9.png') }}" class="img-thumbnail" alt="нет фото" width="400">
                        
                            <p class="card-text">Потрать Карму на нужный тебе товар!</p>
                            <span>
                            <h5>Играйте и зарабатывайте!</h5>
                           <a class="btn btn-secondary" href="https://disk.yandex.ru/d/UUS9PGFLjSYX5A" role="button">скачать</a>
                            <small class="text-muted">оценка 5</small>
                            </span>
                        

                        </div> 
 </div>
                        
                        
                        <div class="card-footer">
                        
                        </div>
               

           
       
       
 
</div>
@endsection