$(function() {
	var $accBtn = $('#acMenu li'),
    $accContents = $('.close');
    
	$accContents.hide(); //contentsを全て隠す
  	$accBtn.each(function() {
    	var flag = "close"; //flagを初期値を設定
    		$(this).click(function() {
    		$(this).next('ul').slideToggle(); //すぐ次の要素をスライド
    			if(flag == "close"){ //もしflagがcloseだったら
        			document.getElementById("cmenuIcon").src = '/cake3app2/img/omenu.png';
       			document.getElementById("cmenu").style.backgroundColor = "#FFFFFF";
       			flag = "open"; //flagをopenにする
      		}else{ //もしflagがopenだったら
      			document.getElementById("cmenuIcon").src = '/cake3app2/img/cmenu.png';
       			document.getElementById("cmenu").style.backgroundColor = "#FF839F";  
    			flag = "close";
      		}
    	});
  	});
  	$("#home").click(function() {
  	    window.location.href = 'profile-list';
	});
	$("#acc").click(function() {
  	    window.location.href = 'accountinformation';
	});
	$("#skin").click(function() {
  	    window.location.href = 'skin';
	});
	$("#fruit").click(function() {
  	    window.location.href = 'fruit';
	});
	$("#upgrade").click(function() {
  	    window.location.href = 'upgrade';
	});
	$("#logout").click(function() {
  		if (confirm('本当にログアウトしますか？')) {
    		window.location.href = 'logout';
  		}
	});
	
	$("#trEditPass").click(function() {
  	    window.location.href = 'update-password';
	});
});