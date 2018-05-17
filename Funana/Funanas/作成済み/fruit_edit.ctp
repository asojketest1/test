<h1>実情報編集</h1>
<table class="profileScreen">
    <?php foreach($data as $obj): ?>
        <?=$this->Form->create($entity,['url'=>['action'=>'fruit']]) ?>
            <tr class="text_form">
                <td><?=$this->Form->text("ITEM_NAME",['value'=>$obj->ITEM_NAME]) ?></td>
                <td>：</td>
                <td><?=$this->Form->text("CONTENT",['value'=>$obj->CONTENT]) ?></td>
                <td><?=$this->Form->button("保存") ?></td>
                <td><?=$this->Form->button("削除",['action'=>'deleteFruit']) ?></td>
                <?=$this->Form->hidden("ITEM_ID", ['value'=>$obj->ITEM_ID]) ?>
            </tr>
        <?=$this->Form->end() ?>
    <?php endforeach; ?>
    <tr>
        <?=$this->Form->create($entity,['url'=>['action'=>'addRecord']]) ?>
            <td><?=$this->Form->text("ITEM_NAME", ['placeholder'=>'趣味や特技を入力してね！！']) ?></td>
            <td><?=$this->Form->text("CONTENT", ['placeholder'=>'何が好き・得意・かな？？']) ?></td>
            <td><?= $this->Form->button('送信') ?></td>
        <?=$this->Form->end() ?>
    </tr>
</table>
