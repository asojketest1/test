<script>
window.onload=function(){
    var hd=document.getElementById('header'); 
    hd.style.display='block'; 
}
function delFruit(itemid){
    document.getElementById('fruitForm').action = "http://localhost/cakephp/funana/deleteFruit?item="+itemid;
}
$(function(){
    $('#btn').click(function(){
        $('#addfruit').show();
        $('#minus').show();
        $('#btn').hide();
    });
});
    $(function(){
        $('#minus').click(function(){
            $('#addfruit').hide();
            $('#minus').hide();
            $('#btn').show();
            return false;
        });
    });
</script>


<table class="tbfruit" id="editFruitTable">
    <tr>
        <?=$this->Form->create($entity,['url'=>['action'=>'skinEdit']]) ?>
            <div style="text-align:center; margin:2%;">
                <?=$this->Form->submit("toFruit.png", ['class'=>'toFruitBtn']) ?>
            </div>
        <?=$this->Form->end() ?>
    </tr>
    <tr>
        <?= $this->Form->hidden("ID",["value"=>$id]) ?>
        <?= $this->Form->hidden("RECORD_ID",["value"=>$record]) ?>
        <?= $this->Form->hidden("ITEM_ID",["value"=>$maxid]) ?>
    <tr>
    <?php foreach($data as $obj): ?>
        <?=$this->Form->create(null,['url'=>['action'=>'fruit'], 'class'=>'fruitForm']) ?>
        <tr>
            <?= $this->Form->hidden("ID",["value"=>$id]) ?>
            <?= $this->Form->hidden("RECORD_ID",["value"=>$record]) ?>
            <?= $this->Form->hidden("ITEM_ID", ['value'=>$obj->ITEM_ID]) ?>
            <td>
                <?=$this->Form->button("－",['type'=>'submit', 'div'=>'false', 'class'=>'delBtn','name'=>'button','value'=>'del' ])?>
            </td>
            <td id="cateTb">
                <?=$this->Form->text("ITEM_NAME",['style'=>"width:10em; padding:1em;", 'class'=>'editFTxtbox', 'value'=>$obj->ITEM_NAME, ['size'=>100]]) ?>
            </td>
            <td id="conTb">
                <?=$this->Form->text("CONTENT", ['style'=>"width:15em; padding:1em;", 'class'=>'editFTxtbox', 'value'=>$obj->CONTENT, ['size'=>100]]) ?>
            </td>
            <td>
                <div id="editSaveBtn">
                    <?=$this->Form->button("保存", ['type'=>'submit', 'div'=>'false','class'=>'fSaveBtn','name'=>'button','value'=>'add']) ?>
                </div>
            </td>
        </tr>
        <?=$this->Form->end() ?>
    <?php endforeach; ?>
    <?=$this->Form->create(null,['url'=>['action'=>'fruit'], 'class'=>'fruitForm']) ?>
    <tr id='addfruit'>
        <?= $this->Form->hidden("ID",["value"=>$id]) ?>
        <?= $this->Form->hidden("ITEM_ID", ['value'=>$maxid]) ?>
        <td>
            <?=$this->Form->button("－",['div'=>'false', 'class'=>'delBtn','id'=>'minus'])?>
        </td>
        <td id="cateTb">
            <?=$this->Form->text("ITEM_NAME",['style'=>"width:10em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?>
        </td>
        <td id="conTb">
            <?=$this->Form->text("CONTENT", ['style'=>"width:15em; padding:1em;", 'class'=>'editFTxtbox', ['size'=>100]]) ?>
        </td>
        <td>
            <div id="editSaveBtn">
                <?=$this->Form->button("保存", ['type'=>'submit', 'div'=>'false','class'=>'fSaveBtn','name'=>'button','value'=>'add']) ?>
            </div>
        </td>
    </tr>
    <?= $this->Form->end()?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <?= $this->Form->button('+', ['id'=>'btn', 'class'=>'addFormBtn']) ?>
        </td>
    </tr>

</table>

