<div id="timer_wrap" >

<progress id="prog_bar" max="60" value="60"></progress>
    
<div class="countdown mt-3" id="countdown" style="font-size:1em; padding:15px 18px;">
          
            <span id="minutes">00</span> :
            <span id="seconds">59</span>
            
</div>

</div>

<script>
    let bar = document.getElementById('prog_bar');
    let sec = document.getElementById('seconds');
    let form = document.getElementById('quiz_form');
    bar.value=59;
    
    let timerId = setInterval(function() {
	bar.value--;
	
	if (bar.value < 10)sec.textContent ='0'+bar.value
	else
	sec.textContent = bar.value;
	if (bar.value <= 0) {
	    form.submit();
		clearInterval(timerId);
	}
}, 1000);

</script>
