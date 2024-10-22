@extends('welcome')
@section('content') 
    <h1>Личный кабинет</h1>
    <ul>
    <li>Имя -> {{$user->name}}</li>    
    <li>Почта -> {{$user->email}}</li>
    <li>Адрес -></li>
    <li>Телефон -></li>
    <li></li>
    <li></li>
    </ul>
    <h2>Мои товары</h2>
    <div>
        <h3>product</h3>
    </div>
@endsection
