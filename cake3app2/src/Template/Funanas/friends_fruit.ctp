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
        <?php foreach($record as $obj2): ?>
            <?php foreach($fruit as $obj1): ?>
                <?php if($obj1->ITEM_ID == $obj2->ITEM_ID): ?>
                    <tr>
                        <td class="inscategory"><?=$obj1->ITEM_NAME ?></td>
                        <td class="inscontent"><?=$obj1->CONTENT ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <div id="insideImgBtm">
        <span id="inL"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('bananafruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('bananafruit.png', ['class'=>'inLR']) ?></span>
    </div>
    <?php foreach($acc as $account): ?>
        <table style="text-align:center; width:100%; margin-bottom: 3%;">
            <tr>
                <td id="changeBtn">
                    <?=$this->Form->create($entity,['url'=>['action'=>'profileList']]) ?>
                        <?=$this->Form->button("一覧に戻る", ['type'=>'submit', 'div'=>'false', 'class'=>'changeBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
                <td id="changeBtn">
                    <?=$this->Form->create($entity,['url'=>['action'=>'friendsFruit?id='.$account->ID]]) ?>
                        <?=$this->Form->button("皮に戻る", ['type'=>'submit', 'div'=>'false', 'class'=>'changeBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
</div>