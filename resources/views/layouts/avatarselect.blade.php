@extends('welcome')

@section('content')
<form action="{{route('avatar.save')}}" method="post">
@csrf
<input type="radio" class="radio-box" name="avatar" id=0 value=1 display=none checked>
<input type="radio" class="radio-box" name="avatar" id=1 value=2 display=none>
<input type="radio" class="radio-box" name="avatar" id=2 value=3 display=none>
<input type="radio" class="radio-box" name="avatar" id=3 value=4 display=none>
<input type="radio" class="radio-box" name="avatar" id=4 value=5 display=none>

<div class="form-check">
    <a href="#"><img class="avatar" type="radio" src="{{ asset('resources/img/avatars/monster-1.png')}}" data-img=0 value=1 onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 10px 10px 10px;" checked> </a>
    <a href="#"><img class="avatar" type="radio" src="{{ asset('resources/img/avatars/monster-2.png')}}" data-img=1 value=2 onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 10px 10px 10px;"> </a>
    <a href="#"><img class="avatar" type="radio" src="{{ asset('resources/img/avatars/monster-3.png')}}" data-img=2 value=3 onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 10px 10px 10px;"> </a>
    <a href="#"><img class="avatar" type="radio" src="{{ asset('resources/img/avatars/monster-4.png')}}" data-img=3 value=4 onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 10px 10px 10px;"> </a>
    <a href="#"><img class="avatar" type="radio" src="{{ asset('resources/img/avatars/monster-5.png')}}" data-img=4 value=5 onError="this.src='{{ asset('resources/img/avatars/monster-3.png')}}'" alt="Avatar" class="avatar" style="float:left; margin: 10px 10px 10px 10px;"> </a>
</div>
<input type="submit">
</form>

<script>

var avatar = document.getElementsByClassName('avatar');

for (var i = 0; i < avatar.length; i++) {
var radio = document.getElementById(i);
radio.style.display='none';

}

for (var i = 0; i < avatar.length; i++) {
    
    avatar[i].onclick = function() {
    for (var i = 0; i < avatar.length; i++) avatar[i].style.border='none';
    var check_radio = document.getElementById(this.getAttribute("data-img"));
    check_radio.checked=true;
    this.style.border="2px solid #c716bd";
    //console.log(this.getAttribute("data-img"));
  };
}

</script>

@endsection