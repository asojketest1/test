<script>
    var img = new Array(5);
    var n = 0;
    for(var j=0; j<3; j++){
        n = j+2;
        img[j] = "/group/img/trade" + n + ".jpg";
    }
    img[3] = "/group/img/apple.jpg";
    i = 0;
	var timer1 = setInterval(changeImg, 1500);//1.5秒間隔
    var timer2;
	function changeImg(){
        $("#animeField").children("img").attr("src",img[i]);
	    if(i < 4){  
	     	i++;
        }else{
            clearInterval(timer1);
            timer2 = setTimeout(fruitImg, 0);
        }
	}
    function fruitImg() {
        clearTimeout(timer2);
        $("#animeField").children("img").attr("src","/group/img/appleskin.png");
        $("#animeField").children("img").attr("class","fruitQR");
        document.getElementById('homeBtn').style.display='block';
    }
</script>
<div id="animeField"><?=$this->Html->image('trade1.jpg', ['class'=>'anime']) ?></div>
<?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
        <div id="homeBtn" style="display:none;">
            <?=$this->Form->button('ホームへ戻る', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'tfHomeBtn']) ?>
        </div>
<?=$this->Form->end(); ?>