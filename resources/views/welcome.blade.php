<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      body {  background-color:brown;
             /* background: url('https://storge.pic2.me/cm/1920x1080/669/622a77b7360bd7.30049156.jpg');*/
              background-repeat: no-repeat;
              background-attachment: fixed; /* Фиксируем фон веб-страницы */ }
    .loader {
  display: none;     
  border: 16px solid #f3f3f3;
  border-radius: 10%;
  border-top: 16px solid blue;
  border-right: 16px solid green;
  border-bottom: 16px solid red;
  border-left: 16px solid pink;
  margin-left:20px;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="{{ URL::asset('resources/js/jquery.min.js') }}" ></script>
     <script src="{{ URL::asset('resources/js/bootstrap.min.js') }}" ></script> 
     <link href="{{ URL::asset('resources/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ URL::asset('resources/css/starter-template.css') }}" rel="stylesheet" type="text/css">
     <link href="{{ URL::asset('resources/css/custom.css') }}" rel="stylesheet" type="text/css">
    
  
    <title>Главная</title>
</head>
<body>
<div id="app">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

          <div class="container-fluid">
            <a class="navbar-brand">
              <h2 style="color: bisque">Dux Game Studio</h2>
              <img src= "{{ URL::asset('resources/img/shop.svg') }}" alt="" width="30" height="24">
              </a>
  
            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{route('main.index')}}">Главная</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('products.index')}}">Магазин</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('start.aibot')}}">AIBot</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('start.aigenimg')}}">AIХудожник</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('games.index')}}">Игры</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('infokarma')}}">Добыча кармы</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="{{route('qwiz-start')}}">Квиз-игра</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('home')}}">Профиль</a>
                </li>
              </ul>

              </div>
              @guest
              <div>
                            @if (Route::has('login'))
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                                     
                                
                            @endif

                            @if (Route::has('register'))
                                
                                   <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            
                            @endif
                </div>
              @else
              
              <div>
              <img src= "{{ URL::asset('resources/img/kk.png') }}" alt="" width="40" height="40" style="float:right; margin: 0px 35px 0px 0px">
              <h3 style="color:white; margin:0px 35px 0px 0px" >{{ Auth::user()->karma }}</h3>
              </div>

              <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выход') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                </li>
              @endguest
          </div>

  </nav>
<div style="margin-top:50px">
    <p>/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
    <p>/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////</p>
</div>
   @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif
   
      @yield('content')
  </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script>

  function  pressButton() {
      
  document.getElementById("loading_id").style.display = "block";
}
</script>
  </body>
  </html>
