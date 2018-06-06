<h1>実情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'profileList']]) ?>
<div class="changeBtn"><?=$this->Form->button("友達一覧に戻る") ?></div>
<?=$this->Form->end() ?>
<?=$this->Form->create($entity,['url'=>['action'=>'friendsprofileAfterPeel']]) ?>
<?=$this->Form->button("皮情報に切り替える") ?><?=$this->Form->end() ?>
<table>
    <?php foreach($data as $obj): ?>
    <tr>
        <td><?=$obj->ITEM_NAME ?></td>
        <td>：</td>
        <td><?=$obj->CONTENT ?></td>
    </tr>
    <?php endforeach; ?>
</table>
