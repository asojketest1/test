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
            <?=$this->Html->image($img, ['class'=>'myIcon', 'style'=>'width:300px; height:300px;']) ?>
            <?=$this->Form->create('UploadData', ['enctype'=>'multipart/form-data', 'url'=>['action'=>'accountinformation'], 'type'=>'post']); ?>
            <?= $this->Form->file('UploadData.img_name'); ?>
            <?=$this->Form->button("保存", ['id'=>'saveBtn', 'class'=>'saveBtn']) ?>
            <?= $this->Form->end(); ?>
        </div>
        <img src="http://chart.apis.google.com/chart?chs=200x200&cht=qr&chl=https://tidaichi.xsrv.jp/cake3app2/funanas/anyone_readqr?id=<?= $obj->ID ?>" alt="QRコード">
        <table class="account_table">
            <tr id="trEditQr" class="editAcc">
                <td id="editQrTxt">QR閲覧用パスワード：</td>
                <td id="editQr"><?= $obj->QRPASS ?></td>
            </tr>
            <tr id="trEditId" class="editAcc" style="width:7em;">
                <td id="editIdTxt">ユーザーID：</td>
                <td id="editId"><?=$obj->ID ?></td>
            </tr>
            <tr id="trEditName" class="editAcc">
                <td id="tdEditNameTxt">ユーザー名：</td>
                <td id="editName"><?=$obj->NAME ?></td>
            </tr>
            <tr id="trEditNameTb">
                <td></td>
                <td id="text_Form">
                    <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                    <span><?=$this->Form->text("NAME", ['style'=>"width:10em; padding:1em;", 'class'=>'txtbox', 'placeholder'=>'ユーザー名','size'=>30]) ?></span>
                    <?=$this->Form->button("保存", ['id'=>'saveBtn', 'class'=>'saveBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
            </tr>
            <tr id="trEditMail" class="editAcc">
                <td id="editMailTxt">メールアドレス：</td>
                <td id="editMail"><?=$obj->MAIL ?></td>
            </tr>
            <tr>
                <td></td>
                <td id="text_Form">
                    <?=$this->Form->create($entity,['url'=>['action'=>'accountinformation']]) ?>
                    <span><?=$this->Form->text("MAIL", ['style'=>"width:10em; padding:1em;", 'class'=>'txtbox', 'placeholder'=>'メールアドレス','size'=>30]) ?></span>
                    <?=$this->Form->button("保存", ['id'=>'saveBtn', 'class'=>'saveBtn']) ?>
                    <?=$this->Form->end() ?>
                </td>
            </tr>
            <tr id="trEditPass" class="editAcc">
                <td id="editPassTxt">パスワード</td>
                <td id="editPass">変更はこちらから<span class="toEdit">></span></td>
            </tr>
        </table>
    <?php endforeach; ?>
    <?=$this->Form->create($entity, ['url'=>['action'=>'profileList']]) ?>
        <?= $this->Form->button('ホームに戻る',['onclick' => 'history.back()', 'type' => 'submit', 'class' => 'backBtn']) ?>
    <?=$this->Form->end() ?>
</div>
