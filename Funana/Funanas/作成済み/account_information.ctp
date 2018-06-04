<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }
</script>
<div id = "account_information">
    <?php foreach($data as $obj): ?>
    
        
        <div id="editMyIcon">
            <?php $img = $obj->ICON_URL; ?>
            <?=$this->Form->submit($img,['id' =>'chengebtn','class'=>'myIcon']) ?>
            
            <?= $this->form->create('UploadData', array('enctype' => 'multipart/form-data','url' => array('action'=>'accountInformation'),'type' => 'post')); ?>
            <?= $this->form->input('UploadData.img_name', array('type'=>'file' )); ?>
            <?= $this->form->submit('画像を保存'); ?>
            <?= $this->form->end(); ?>
            
            
        </div>
    
        <table class="account_table">
            <tr id="trEditId" class="editAcc" style="width:7em;">
                <td id="editIdTxt">ユーザーID：</td>
                <td id="editId"><?=$obj->ID ?></td>
            </tr>
            <tr id="trEditName" class="editAcc">
                <td id="editNameTxt">ユーザー名：</td>
                <td id="editName"><?=$obj->NAME ?></td>
            </tr>
            <tr id="trEditNameTb">
                <td></td>
                <td id="text_Form">
                    <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                    <span><?=$this->Form->text("NAME", ['style'=>"width:20em; padding:1em;", 'class'=>'txtbox', 'placeholder'=>'ユーザー名','size'=>50]) ?></span>
                    <?=$this->Form->button("保存", ['id'=>'saveBtn', 'class'=>'saveBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
            </tr>
            <tr id="trEditMail" class="editAcc">
                <td>メールアドレス：</td>
                <td><?=$obj->MAil ?></td>
            </tr>
            <tr>
                <td></td>
                <td id="text_Form">
                    <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                    <span><?=$this->Form->text("MAil", ['style'=>"width:20em; padding:1em;", 'class'=>'txtbox', 'placeholder'=>'メールアドレス','size'=>50]) ?></span>
                    <?=$this->Form->button("保存", ['id'=>'saveBtn', 'class'=>'saveBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
            </tr>
            <tr id="trEditPass" class="editAcc">
                <td id="editPassTxt">パスワード</td>
                <td id="editPass">・・・・・・<span class="toEdit">></span></td>
            </tr>
            <tr id="trEditPhone" class="editAcc">
                <td id="editPhoneTxt">電話番号</td>
                <td id="editPhone">+81 9999-9999<span class="toEdit">></span></td>
            </tr>
        </table>
    <?php endforeach; ?>
    <?=$this->Form->create($entity) ?>
        <?= $this->Form->button('前の画面に戻る',['onclick' => 'history.back()', 'type' => 'button']) ?>
    <?=$this->Form->end() ?>
</div>
