<h2>相手に送信する情報にチェックしてね！</h2>
<hr>
<h4>送信が確定されている皮情報だよ！</h4>
<?php foreach($skin as $obj): ?>
    <table>
        <tr>
            <td>本名は：</td>
            <td><?=$obj->REAL_NAME ?></td>
        </tr>
        <tr>
            <td>所属会社・学校</td>
            <td><?=$obj->TEAM ?></td>
        </tr>
    </table>
    <?=$obj->REAL_NAME ?>
<?php endforeach; ?>

<hr>

<h4>相手に送信する情報にチェックをしてね！</h4>
<?=$this->Form->create($entity,['url'=>['action'=>'after_exchange_information']]) ?>
    <?php foreach($fruit as $obj): ?>
        <table>
            <tr>
                <td><input type="checkbox" name="check[]" value=<?=$obj->ITEM_ID ?> ></td>
                <td><?=$obj->ITEM_NAME ?>は：</td>
                <td><?=$obj->CONTENT ?></td>
            </tr>
        </table>
        <?=$obj->REAL_NAME ?>
    <?php endforeach; ?>
    <?=$this->Form->button("いけーーー") ?>
<?=$this->Form->end() ?>
