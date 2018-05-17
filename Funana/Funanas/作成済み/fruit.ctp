<h1>実情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
<?=$this->Form->button("皮情報に切り替える") ?><?=$this->Form->end() ?>
<table>
    <?php foreach($data as $obj): ?>
        <tr>
            <td><?=$obj->ITEM_NAME ?></td>
            <td>：</td>
            <td><?=$obj->CONTENT ?></td>
        </tr>
    <?php endforeach; ?>
    <tr class="saveBtn">
        <?=$this->Form->create($entity,['url'=>['action'=>'fruit_edit']]) ?>
            <td><?=$this->Form->button("編集する") ?></td>
            <?=$this->Form->end() ?>
        </tr>
</table>
