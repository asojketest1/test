<div class="loginImg" style="position:relative;">a
    <div class="ardFruitImg-base"><?=$this->Html->image('wAroundFruit.png', ['class'=>'ardFruitImg']) ?></div> 
    <div style="position:absolute; top:30%; left:22%; bottom:30%; right:22%; margin:auto;">
        <div id="loginTxt">
            <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
                <div id="loginIdTxt">ログインID</div>
                <?=$this->Form->text("loginid", ['style'=>"width:25em; padding:1em;", 'class'=>'loginIdTxtbox', 'placeholder'=>'メールアドレスまたはログインID',  ['size'=>100]]) ?><br />
                <div id="passTxt">パスワード</div>
                <?=$this->Form->text("password", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'パスワード',   ['size'=>100]]) ?>
                <div id="divSignInBtn">
                    <?=$this->Form->button('Sign In', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'signInBtn']) ?>
                </div>
            <?=$this->Form->end(); ?>
        </div>
    </div>
</div>
