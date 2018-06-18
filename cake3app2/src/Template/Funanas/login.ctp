<div class="loginImg" style="position:relative;">
    <div class="ardFruitImg-base"><?=$this->Html->image('wAroundFruit.png', ['class'=>'ardFruitImg']) ?></div> 
    <div style="position:absolute; top:18%; left:15%; bottom:30%; right:18%; margin:auto;">
        <div id="loginTxt">
            <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'login']]) ?>
                <div id="loginIdTxt">メールアドレス</div>
                <?=$this->Form->text("MAIL", ['style'=>"width:25em; padding:1em;", 'class'=>'loginIdTxtbox', 'placeholder'=>'メールアドレス',  ['size'=>100]]) ?><br />
                <div id="passTxt">パスワード</div>
                <?=$this->Form->password("PASS", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'パスワード',   ['size'=>100]]) ?>
                <div id="divSignInBtn">
                    <?=$this->Form->button('Sign In', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'signInBtn']) ?>
                </div>
            <?=$this->Form->end(); ?>
        </div>
    </div>
</div>
