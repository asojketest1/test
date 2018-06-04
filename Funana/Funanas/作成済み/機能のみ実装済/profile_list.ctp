<script>
    window.onload=function(){
        var hd=document.getElementById('header');
        hd.style.display='block';
    }
</script>

<div class="search">
    <table>
        <tr>
            <td>
                <?=$this->Form->create(null,['url'=>['action'=>'profile_list']]) ?>
                <?=$this->Form->text("search", ['style'=>"width:80%; padding:1em;", 'class'=>'searchTxtbox', 'placeholder'=>'名前からの検索', ['size'=>500]]) ?></span>
            </td>
            <td>
                <span><?=$this->Form->submit('search.png', array('alt'=>'　', 'class'=>'searchBtn'));?></span>
                <?=$this->Form->end() ?>
            </td>
        </tr>
    </table>
</div>

<?php  foreach($account as $obj): ?>
    <table id = "myProfile">
        <td id = "myPhoto">
            <?=$this->Html->image($obj->ICON_URL, ['class'=>'myIcon']) ?>
        </td>
        <td id = "myInformation">
            <div id = "myName"><?=$obj->NAME ?></div>
            <span id = "myMailIcon"><?=$this->Html->image('mailIcon.png',['class'=>'mailIcon']);?></span><span id = "myMail"><?=$obj->MAIL ?></span>
        </td>
    </table>
    <br/>
        <div id="friendCnt"><hr>
            友達人数
            <?=$firends ?>
        <hr></div>
<?php  endforeach;  ?>
<hr>
<?php foreach($recordId as $recordid): ?>
    <?php foreach($friend as $obj): ?>
        <?php if($recordid == $obj->ID): ?>
            <table id = "friendList">
                <tr>
                    <td id="friendPhoto">
                        <?=$this->Html->image($obj->ICON_URL,['class'=>'friendIcon']) ?>
                    </td>
                    <td id="friendName">
                        <?=$obj->NAME ?>
                    </td>
                    <?=$this->Form->create($entity_record,['url'=>['action'=>'delRecord']]) ?>
                        <?=$this->Form->hidden("data",['value'=>$data]) ?>
                        <td>
                            <?=$this->Form->button('削除') ?>
                            <?=$this->Html->link('編集', ['action'=>'input', '?'=>array('id'=>$obj->id)]);?>
                        </td>
                    <?=$this->Form->end() ?>
                </tr>
            </table>
            <hr>
        <?php  endif;  ?>
    <?php  endforeach;  ?>
<?php  endforeach;  ?>

<div id="tradeFruit">
    <?=$this->Form->create(null,['url'=>['action'=>'tradefruit_select']]) ?>
        <?=$this->Form->submit("tradeFruit.png", ['class'=>'tradeBtn']) ?>
    <?=$this->Form->end() ?>
</div>
