<script>
    var img = new Array(5);
    var n = 0;
    for(var j=0; j<4; j++){
        n = j+2;
        img[j] = "/group/img/trade" + n + ".jpg";
    }
    img[3] = "/group/img/apple.jpg";
    i = 0;
	var count = setInterval(changeImg, 1500);//1.5秒間隔
	function changeImg(){
        $("#animeField").children("img").attr("src",img[i]);
        $("#animeField").fadeIn("slow");
	    if(i < 5){  
	     	i++;
        }else{
            window.setTimeout(fruitImg, 0);
        }
	}
    function fruitImg() {
        $("#animeField").children("img").attr("src","/group/img/appleskin.png");
        $("#animeField").children("img").attr("class","fruitQR");
    }
</script>
<div id="animeField"><?=$this->Html->image('trade1.jpg', ['class'=>'anime']) ?></div>