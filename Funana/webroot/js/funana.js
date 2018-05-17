$(function() {
	var $accBtn = $('#acMenu li'),
    $accContents = $('.close');
    
	$accContents.hide(); //contentsを全て隠す
  	$accBtn.each(function() {
    	var flag = "close"; //flagを初期値を設定
    		$(this).click(function() {
    		$(this).next('ul').slideToggle(); //すぐ次の要素をスライド
    			if(flag == "close"){ //もしflagがcloseだったら
        			document.getElementById("cmenuIcon").src = '/group/img/omenu.png';
       			document.getElementById("cmenu").style.backgroundColor = "#FFFFFF";
       			flag = "open"; //flagをopenにする
      		}else{ //もしflagがopenだったら
      			document.getElementById("cmenuIcon").src = '/group/img/cmenu.png';
       			document.getElementById("cmenu").style.backgroundColor = "#FF839F";  
    			flag = "close";
      		}
    	});
  	});
  	$("#home").click(function() {
  	    window.location.href = 'http://localhost/group/funana/profile-list';
	});
	$("#acc").click(function() {
  	    window.location.href = 'http://localhost/group/funana/accountinformation';
	});
	$("#skin").click(function() {
  	    window.location.href = 'http://localhost/group/funana/skin';
	});
	$("#fruit").click(function() {
  	    window.location.href = 'http://localhost/group/funana/fruit';
	});
	$("#upgrade").click(function() {
  	    window.location.href = 'http://localhost/group/funana/upgrade';
	});
	$("#logout").click(function() {
  		if (confirm('本当にログアウトしますか？')) {
    		window.location.href = 'http://localhost/group/funana';
  		}
	});

});