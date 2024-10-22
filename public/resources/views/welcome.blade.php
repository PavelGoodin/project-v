<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      body {  background-color: darkslategray;
             /* background: url('https://storge.pic2.me/cm/1920x1080/669/622a77b7360bd7.30049156.jpg');*/
             /* background-repeat: no-repeat;*/
             /* background-attachment: fixed;*/ /* Фиксируем фон веб-страницы */ }
    </style>
     <script src="/js/jquery.min.js"></script>
     <script src= "/js/bootstrap.min.js"></script> 
     <link href="{{ URL::asset('resources/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
     <link href="/css/starter-template.css" rel="stylesheet" type="text/css">
    
    
    <title>Главная</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand">
            <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
            </a>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">Главная</a>
              </li>
              <li class="nav-item">

                <a class="nav-link" href="{{route('products.index')}}">Магазин</a>
                
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Категории</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('profile.index')}}">Профиль</a>
              </li>
            </ul>
            </div>
        </div>
       
    </nav>

    <div class="alert alert-danger" role="alert">
      Внимание! Это сообщение для разработчиков!
    </div>

    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>