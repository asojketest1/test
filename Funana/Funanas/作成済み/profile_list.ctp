<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }
</script>
<div class="search">
	<?=$this->Form->create(null,['url'=>['action'=>'profile_list']]) ?>
	    <?=$this->Form->text("search", ['style'=>"width:80%; padding:1em;", 'class'=>'searchTxtbox', 'placeholder'=>'名前・所属からの検索', ['size'=>300]]) ?>
	    <?=$this->Html->image("search.png", ['class'=>'searchBtn']) ?>
	<?=$this->Form->end() ?>
</div>
<table id="myProfile">
    <td id="myPhoto">
        <?=$this->Html->image('miyazaki.png', ['class'=>'myIcon']) ?>
    </td>
    <td id="myInformation">
        <div id="myName">みやざき</div>
        <span id="myMailIcon"><?=$this->Html->image("mailIcon.png", ['class'=>'mailIcon']) ?></span><span id = "myMail">：Aso@student.jp</span>
    </td>
</table>
<br/>
<hr>
<div id="friendCnt">友達人数:<?php echo "1";//自分を含めない友達人数を表示する ?></div>
<hr>
<?php  //foreach($account as $obj): //自分の友達を一覧表示?>
    <table id=friendList>
        <tr>
            <td id="friendPhoto"><?=$this->Html->image("fruit.png", ['class'=>'friendIcon']) ?></td>
            <td id="friendName">フルーツ太郎</td>
        </tr>
    </table>
    <hr>
<?php  //endforeach;  ?>
<div id="tradeFruit">
    <?=$this->Form->create(null,['url'=>['action'=>'tradefruit_select']]) ?>
        <?=$this->Form->submit("tradeFruit.png", ['class'=>'tradeBtn']) ?>
    <?=$this->Form->end() ?>
</div>

