<div id = "account_information">
    <table class="account_table">
        <?php foreach($data as $obj): ?>
            <tr>
                <td>ユーザーID：</td>
                <td><?=$obj->ID ?></td>
            </tr>
            <tr>
                <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                <td>ユーザー名：</td>
                <td><?=$obj->NAME ?></td>
                <td><?=$this->Form->text("NAME", ['placeholder'=>'ユーザー名','size'=>50]) ?></td>
                <td><?=$this->Form->button("保存") ?></td>
                <?=$this->Form->end() ?>
            </tr>
            <tr>
                <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                <td>メールアドレス：</td>
                <td><?=$obj->MAil ?></td>
                <td><?=$this->Form->text("MAil", ['placeholder'=>'メールアドレス','size'=>50]) ?></td>
                <td><?=$this->Form->button("保存") ?></td>
                <?=$this->Form->end() ?>
            </tr>
            <tr>
                <?=$this->Form->create($entity) ?>
                <td><?= $this->Form->button('メインメニューに戻る',['onclick' => 'history.back()', 'type' => 'button']) ?></td>
                <?=$this->Form->end() ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
