<?=$this->Form->create($entity,['url'=>['action'=>'add_record']]) ?>
    <table>
        <tr>
            <?php //仮idへの登録 ?>
            <td class="id">テストid：</td>
            <td><?=$this->Form->text("ID") ?></td>
        </tr>
        
        <tr>
            <?php //仮idへの登録 ?>
            <td class="item_id">テストid：</td>
            <td><?=$this->Form->text("ITEM_ID") ?></td>
        </tr>
        
        <tr>
            <td class="title">タイトル：</td>
            <td><?=$this->Form->text("ITEM_NAME") ?></td>
        </tr>
        <tr>
            <td class="content">内容：</td>
            <td><?=$this->Form->textarea("CONTENT", ['rows'=>'10', 'id'=>'textform']) ?></td>
        </tr>
     </table>
    <?=$this->Form->button("送信") ?>
    <?=$this->Form->end() ?>