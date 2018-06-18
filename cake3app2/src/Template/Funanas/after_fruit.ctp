<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<div id="inside">
    <div id="insideImgTp">
        <span id="inL"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
    </div>
    <table id="insideTable">
        <?php foreach($data as $obj): ?>
            <tr>
                <td class="inscategory"><?=$obj->ITEM_NAME ?></td>
                <td class="inscontent"><?=$obj->CONTENT ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div id="insideImgBtm">
        <span id="inL"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
    </div>
</div>
<?php foreach($acc as $fruit): ?>
    <table id="skinBtns">
        <tr>
            <td id="mchangeBtn">
                <?=$this->Form->create($entity,['url'=>['action'=>'afterSkin?id='.$fruit->ID]]) ?>
                    <?=$this->Form->button("皮に戻る", ['type'=>'submit', 'div'=>'false', 'class'=>'changeBtn']) ?>
                <?=$this->Form->end() ?>
            </td>
        </tr>
    </table>
<?php endforeach; ?>
