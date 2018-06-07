<h1>実情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'profileList']]) ?>
<div class="changeBtn"><?=$this->Form->button("友達一覧に戻る") ?></div>
<?=$this->Form->end() ?>
<?=$this->Form->create($entity,['url'=>['action'=>'friendsprofileAfterPeel']]) ?>
<?=$this->Form->button("皮情報に切り替える") ?><?=$this->Form->end() ?>
<table>
    <?php foreach($record as $obj2): ?>
        <?php foreach($fruit as $obj1): ?>
            <?php if($obj1->ITEM_ID == $obj2->ITEM_ID): ?>
                <tr>
                    <td><?=$obj1->ITEM_NAME ?></td>
                    <td><?=$obj1->CONTENT ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
