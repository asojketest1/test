<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }
</script>
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
                <td class="text_Form"><?=$this->Form->text("NAME", ['placeholder'=>'ユーザー名','size'=>50]) ?></td>
                <td class="saveBtn"><?=$this->Form->button("保存") ?></td>
                <?=$this->Form->end() ?>
            </tr>
            <tr>
                <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                <td>メールアドレス：</td>
                <td><?=$obj->MAil ?></td>
                <td class="text_Form"><?=$this->Form->text("MAil", ['placeholder'=>'メールアドレス','size'=>50]) ?></td>
                <td class="saveBtn"><?=$this->Form->button("保存") ?></td>
                <?=$this->Form->end() ?>
            </tr>
            <tr>
                <?=$this->Form->create($entity) ?>
                <td class="backBtn"><?= $this->Form->button('前の画面に戻る',['onclick' => 'history.back()', 'type' => 'button']) ?></td>
                <?=$this->Form->end() ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
