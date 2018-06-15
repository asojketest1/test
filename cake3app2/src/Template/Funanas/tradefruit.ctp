<script>
    var img = new Array(5);
    var n = 0;
    for(var j=0; j<3; j++){
        n = j+2;
        img[j] = "/cake3app2//img/trade" + n + ".jpg";
    }
    img[3] = "/cake3app2/img/banana.jpg";
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
        $("#animeField").children("img").attr("src","/cake3app2/img/bananaskin.png");
        $("#animeField").children("img").attr("class","fruitQR");
        document.getElementById('friendBtn').style.display='block';
        document.getElementById('homeBtn').style.display='block';
        document.getElementById('myqr').style.display='block';
    }
</script>
<div id="animeField" style="position:relative;"><?=$this->Html->image('trade1.jpg', ['class'=>'anime']) ?></div>
<div id="myqr" style="display:none; position:absolute; top:40%; left:40%;">
    <img src="http://chart.apis.google.com/chart?chs=250x250&cht=qr&chl=<?=$paramater?>" alt="QRコード">
</div>
<?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
        <div id="homeBtn" style="display:none;">
            <?=$this->Form->button('ホームへ戻る', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'tfHomeBtn']) ?>
        </div>
<?=$this->Form->end(); ?>
<?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'qrReader']]) ?>
<?= $this->Form->hidden('paramater',['value'=>$paramater]) ?>
<div id="friendBtn" style="display:none; text-align:center;">
    <?=$this->Form->button('QR読み取り', ['type'=>'submit', 'div'=>'false',
                                      'class'=>'tfHomeBtn']) ?>
</div>
<?=$this->Form->end(); ?>