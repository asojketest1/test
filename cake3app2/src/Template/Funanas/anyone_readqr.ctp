<div id="accessTxt">
    <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'anyoneReadqr']]) ?>
        <div id="accPassTxt">この画面にアクセスするには設定されているパスワードが必要です。</div>
        <div id="accPassTxt2">パスワードがわからない場合はこのプロフィールの本人に聞いてください</div>
        <?=$this->Form->text("password", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'パスワード',   ['size'=>5]]) ?>
        <?= $this->Form->hidden('id',['value'=>$id]) ?>
        <div id="divSignInBtn">
            <?=$this->Form->button('OK', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'signInBtn']) ?>
        </div>
    <?=$this->Form->end(); ?>
</div>
