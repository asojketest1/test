<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<div id="inside">
    <div id="insideImgTp">
        <span id="inL"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
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
        <span id="inL"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
    </div>
</div>
<table id="skinBtns">
    <tr>
        <td id="mchangeBtn">
            <?=$this->Form->create($entity,['url'=>['action'=>'afterskin']]) ?>
                <?=$this->Form->button("皮を被せる", ['type'=>'submit', 'div'=>'false', 'class'=>'changeBtn']) ?>
            <?=$this->Form->end() ?>
        </td>
    </tr>
</table>
