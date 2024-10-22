@extends('welcome')

@section('content') 
<div id="quiz" align="center">

	<form action="/games/gwizle/{{$question->number+1}}" method="POST" id="quiz_form">
	@csrf		
    <div class="card-answer" style="width: 24rem;" >
       
        <div class="card-body">
            <h2>Вопрос №{{$question->number}}</h2>
            @include('layouts.timer')
            <img src="{{$question->question_image}}" onError="this.src='{{ asset('resources/img/qwiz_zaglushka.jpg')}}'" class="card-img-top"  width="200px" height="250px">
            
            
            <h5 class="card-title">{{$question->question_head}}</h5>
            <p class="card-text">{{$question->question_text}}</p>
           
            <span>
            <h5>{{$question->prize}}</h5>
            <img src= "{{ URL::asset('resources/img/kk.png') }}" alt="" width="40" height="40" style=" margin: 0px 0px 0px 0px">
            </span>
            </div>                
            <div class="card-footer">
                <div style="margin-botton:10px">
                <input type="text" name="answer" class="form-control" placeholder="Ответ" size="40" >
                </div>
                <div>        
                        <small class="text-muted">оценка 5</small>
                        <button type="submit" class="btn btn-primary" style="margin:20px">Ответ</button>
                </div>
       
           </div>
    
    </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input id="q_n" type="hidden" name="number" value="{{$question->number}}" />
    </form>
		
	

</div>
  @endsection