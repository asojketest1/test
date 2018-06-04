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

<?php  foreach($account as $obj): ?>
    <table id = "myProfile">
        <td id = "myPhoto">
            <?php
                if($obj->ICON_URL == null){
                    echo $this->Html->image('noIcon.png', ['class'=>'myIcon']);
                }else{
                    echo $this->Html->image($obj->ICON_URL, ['class'=>'myIcon']);
                }
            ?>
        </td>
        <td id = "myInformation">
            <div id = "myName"><?=$obj->NAME ?></div>
            <span id = "myMailIcon"><?=$this->Html->image('mailIcon.png',['class'=>'mailIcon']);?></span><span id = "myMail"><?=$obj->MAIL ?></span>
        </td>
    </table>
    <br/>
    <hr>
        <div id="friendCnt">
            友達人数
            <?=$firends ?>
        </div> 
<?php  endforeach;  ?>

<hr>

<?php 
    foreach ($recordId as $record) {
        foreach($friend as $obj){
            if($record == $obj->ID){
                if($obj->ICON_URL == null){
                    $image = "noIcon.png";
                }else{
                    $image = $obj->ICON_URL;
                }
                echo '<table id = "friendList">';
                echo '<tr>';
                echo '<td id="friendPhoto">' . $this->Html->image($image,['class'=>'friendIcon']) . '</td>';
                echo '<td id="friendName">' . $obj->NAME . '</td>';
                echo '</tr>';
                echo'</table>';
                echo '<hr>';
            }
        }
    }
?>


<div id="tradeFruit">
    <?=$this->Form->create(null,['url'=>['action'=>'tradefruit_select']]) ?>
        <?=$this->Form->submit("tradeFruit.png", ['class'=>'tradeBtn']) ?>
    <?=$this->Form->end() ?>
</div>
