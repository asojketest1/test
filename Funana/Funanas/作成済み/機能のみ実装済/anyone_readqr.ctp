<div class="loginImg" style="position:relative;">

    <div style="position:absolute; top:30%; left:22%; bottom:30%; right:22%; margin:auto;">
        <div id="loginTxt">
            <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'afterReadqr']]) ?>
            <div id="passTxt">この画面にアクセスするには設定されているパスワードが必要です。</div>
            <div>パスワードがわからない場合はこのプロフィールの本人に聞いてください</div>
                <?=$this->Form->text("password", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'パスワード',['size'=>5]]) ?>
                <div id="divSignInBtn">
                    <?=$this->Form->button('OK', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'signInBtn']) ?>
                </div>
            <?=$this->Form->end(); ?>
        </div>
    </div>
</div>