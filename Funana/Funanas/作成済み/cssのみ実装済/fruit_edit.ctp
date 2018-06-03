<script>
window.onload=function(){
    var hd=document.getElementById('header'); 
    hd.style.display='block'; 
}
function delFruit(){
    document.getElementById('fruitForm').action = 'http://localhost/group/funana/deleteFruit';
}
$(function(){
    var index = 1;
    $('#btn').click(function(){
        var tr_element = document.createElement("tr");
        tr_element.innerHTML =  '<?= $this->Form->hidden("ID",["value"=>$id]) ?>'+
                                '<?= $this->Form->hidden("ITEM_ID",["value"=>$maxid]) ?>'+
                                '<td class="inscategory"><?=$this->Form->text("ITEM_NAME", ['style'=>"width:10em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?></td>'+
                                '<td class="inscontent"><?=$this->Form->text("CONTENT", ['style'=>"width:20em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?></td><td></td>';
        var parent_object = document.getElementById("editFruitTable");
        parent_object.appendChild(tr_element);
        index++;
        return false;
    });
});
</script>
<?=$this->Form->create(null,['url'=>['action'=>'skin-edit']]) ?>
    <div id="toFruitBtn">
        <?=$this->Form->submit("toFruit.png", ['class'=>'toFruitBtn']) ?>
    </div>
<?=$this->Form->end() ?>
<?=$this->Form->create(null,['url'=>['action'=>'fruit'], 'id'=>'fruitForm']) ?>
    <div id="editSaveBtn">
        <?=$this->Form->button("保存", ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'saveBtn']) ?>
    </div>
    <table class="tbfruit" id="editFruitTable">
        <?php foreach($data as $obj): ?>
            <tr>
                <?= $this->Form->hidden("ID",["value"=>$id]) ?>
                <?= $this->Form->hidden("ITEM_ID", ['value'=>$obj->ITEM_ID]) ?>
                <td class="inscategory">
                    <?=$this->Form->text("ITEM_NAME",['style'=>"width:10em; padding:1em;", 'class'=>'editFTxtbox', 'value'=>$obj->ITEM_NAME, ['size'=>100]]) ?>
                </td>
                <td class="inscontent">
                    <?=$this->Form->text("CONTENT", ['style'=>"width:20em; padding:1em;", 'class'=>'editFTxtbox', 'value'=>$obj->CONTENT, ['size'=>100]]) ?>
                </td>
                <td><?=$this->Form->button("－",['type'=>'submit', 'div'=>'false', 'class'=>'delBtn', 'onclick'=>'delFruit();']) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <?= $this->Form->hidden("ID",["value"=>$id]) ?>
            <?= $this->Form->hidden("ITEM_ID",["value"=>$maxid]) ?>
            <td class="inscategory">
                <?=$this->Form->text("ITEM_NAME", ['style'=>"width:10em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?>
            </td>
            <td class="inscontent">
                <?=$this->Form->text("CONTENT", ['style'=>"width:20em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?>
            </td>
            <td><?= $this->Form->button('+', ['id'=>'btn', 'class'=>'addFormBtn']) ?></td>
        <tr>
    </table>
<?=$this->Form->end() ?>

