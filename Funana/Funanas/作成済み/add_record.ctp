<?php  foreach($data  as  $obj):  ?>
<p><?=$obj->ID ?>:<?=$obj->ITEM_ID ?>:<?=$obj->ITEM_NAME ?>:<?=$obj->CONTENT ?></p><?=$this->Form->button("削除") ?>
<?php  endforeach;  ?>



<?=$this->Form->create($entity,['url'=>['action'=>'add_record']]) ?>
    <table>
        
        <tr>
            <td class="title">タイトル：</td>
            <td><?=$this->Form->text("ITEM_NAME") ?></td>
        </tr>
        <tr>
            <td class="">内容：</td>
            <td><?=$this->Form->textarea("CONTENT", ['rows'=>'10', 'id'=>'textform']) ?></td>
        </tr>
     </table>
    <?=$this->Form->button("保存") ?>
    <?=$this->Form->end() ?>
