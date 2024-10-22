@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Личный кабинет') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <a href="{{ route('profile.avatar') }}"><img src="{{ asset('resources/img/avatars/'.$user->avatar)}}"  onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 40px 40px 10px;"> </a>
    <ul>
    <li>Имя -> {{ $user->name }}</li>    
    <li>Почта -> {{ $user->email }}</li>
    <li id="secretkey" type="password">Секретный ключ -> {{ $user->secret_key }}</li>
    <button id="show">Скрыть</button>
    <li ><a href="#">Мои покупки</a></li>
    <li ><a href="#">Мои игры</a></li>
    </ul>
    
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Пополнить карму!</a>
    </p>
                </div>
            </div>
        </div>
    </div>
</div>

 <script>
  var textkey = document.getElementById("secretkey");
  var button = document.getElementById("show");
  button.onclick = show;
  var visiblekey=true;

  function show () {
   if(visiblekey == false) {
    visiblekey=true;
    textkey.textContent="Секретный ключ -> {{ $user->secret_key }}";
    button.innerHTML='Скрыть';

   } else {
    visiblekey=false;
    textkey.textContent="Секретный ключ -> XXXX-XXXX-XXXX";
    button.innerHTML='Показать';

   }
  }
 </script>
@endsection
