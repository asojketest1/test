<script>
window.onload=function(){
    var hd=document.getElementById('header'); 
    hd.style.display='block'; 
}      
</script>
<?=$this->Form->create(null,['url'=>['action'=>'fruit-edit']]) ?>
<div id="toFruitBtn">
    <?=$this->Form->submit("toFruit.png", ['class'=>'toFruitBtn']) ?>
</div>
<?=$this->Form->end() ?>
<?=$this->Form->create(null,['url'=>['action'=>'skin']]) ?>
<div id="editSaveBtn">
    <?=$this->Form->button("保存", ['type'=>'submit', 'div'=>'false',
                                                                'class'=>'saveBtn']) ?>
</div>
<?php foreach($data as $obj): ?>
    <div id="skinEditTxt">
        <div id="editNameTxt">名前</div>
        <?=$this->Form->text("REAL_NAME",['style'=>"width:40em; padding:1em;", 'class'=>'editTxtbox', 'value'=>$obj->REAL_NAME, ['size'=>100]]) ?><br/>
        <div id="editBelTxt">所属</div>
        <?=$this->Form->text("TEAM",['style'=>"width:40em; padding:1em;", 'class'=>'editTxtbox', 'value'=>$obj->TEAM, ['size'=>100]]) ?><br/>
        <div id="editSubTxt">得意科目</div>
        <?=$this->Form->text("SUBJECT",['style'=>"width:40em; padding:1em;", 'class'=>'editTxtbox', 'value'=>$obj->SUBJECT, ['size'=>100]]) ?><br/>
    </div>
    <table id="tbEditSkin">
        <tr class="radio02">
            <td class="editSkinImg"><?=$this->Html->image('silent.png', ['class'=>'editMark']) ?></td>
            <td class="editSkinL">黙々派</td>
            <td>
                <?=$this->Form->radio("S_or_T",
                    [
                        ['text'=>'　―――――','value'=>0],
                        ['text'=>'　―――――','value'=>1],
                        ['text'=>'','value'=>2]
                    ],
                    ['class'=>'radio02-input','value'=>$obj->S_or_T])?>
            </td>
            <td class="editSkinR">ワイワイ派</td>
            <td class="editSkinImg"><?=$this->Html->image('talk.png', ['class'=>'editMark']) ?></td>
        </tr>
        <tr class="radio02">
            <td class="editSkinImg"><?=$this->Html->image('pc.png', ['class'=>'editMark']) ?></td>
            <td class="editSkinL">パソコン派</td>
            <td>
                <?=$this->Form->radio("P_or_P",
                    [
                        ['text'=>'　―――――','value'=>0],
                        ['text'=>'　―――――','value'=>1],
                        ['text'=>'','value'=>2]
                    ],
                    ['class'=>'radio02-input','value'=>$obj->P_or_P])?>
            </td>
            <td class="editSkinR">手書き派</td>
            <td class="editSkinImg"><?=$this->Html->image('write.png', ['class'=>'editMark']) ?></td>
        </tr>
        <tr class="radio02">
            <td class="editSkinImg"><?=$this->Html->image('new.png', ['class'=>'editMark']) ?></td>
            <td class="editSkinL">創造派</td>
            <td>
                <?=$this->Form->radio("I_or_M",
                    [
                        ['text'=>'　―――――','value'=>0],
                        ['text'=>'　―――――','value'=>1],
                        ['text'=>'','value'=>2]
                    ],
                    ['class'=>'radio02-input','value'=>$obj->I_or_M])?>
            </td>
            <td class="editSkinR">改良派</td>                
            <td class="editSkinImg"><?=$this->Html->image('change.png', ['class'=>'editMark']) ?></td>
        </tr>
        <tr class="radio02">
            <td class="editSkinImg"><?=$this->Html->image('idea.png', ['class'=>'editMark']) ?></td>
            <td class="editSkinL">アイディア派</td>
            <td>
                <?=$this->Form->radio("I_or_C",
                    [
                        ['text'=>'　―――――','value'=>0],
                        ['text'=>'　―――――','value'=>1],
                        ['text'=>'','value'=>2]
                    ],
                    ['class'=>'radio02-input','value'=>$obj->I_or_C])?>
            </td>
            <td class="editSkinR">実行派</td>                
            <td class="editSkinImg"><?=$this->Html->image('make.png', ['class'=>'editMark']) ?></td>
        </tr>
    </table>
<?php endforeach; ?>
<?=$this->Form->end() ?>
