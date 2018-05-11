<div class="registImg" style="position:relative;">
    <div class="ardFruitImg-base"><?=$this->Html->image('hAroundFruit.png', ['class'=>'ardFruitImg']) ?></div> 
    <div style="position:absolute; top:30%; left:22%; bottom:30%; right:22%; margin:auto;">
        <div id="necTxt">必要事項を入力してください</div>
        <div id="registTxt">
            <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
                <div id="nameTxt">名前</div>
                <?=$this->Form->text("name", ['style'=>"width:25em; padding:1em;", 'class'=>'nameTxtbox', 'placeholder'=>'ニックネームでも可',  ['size'=>100]]) ?><br />
                <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
                <div id="mailTxt">メールアドレス</div>
                <?=$this->Form->text("mail", ['style'=>"width:25em; padding:1em;", 'class'=>'mailTxtbox', 'placeholder'=>'メールアドレス',  ['size'=>100]]) ?><br />
                <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
                <div id="phoneTxt">電話番号</div>
                <?=$this->Form->text("phone", ['style'=>"width:25em; padding:1em;", 'class'=>'phoneTxtbox', 'placeholder'=>'(+81)999-9999',  ['size'=>100]]) ?><br />
                <div id="passTxt">パスワード</div>
                <?=$this->Form->text("password", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'8桁以上の英数字',   ['size'=>100]]) ?>
                <div id="divSignUpBtn">
                    <?=$this->Form->button('Sign Up Free', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'signUpBtn']) ?>
                </div>
            <?=$this->Form->end(); ?>
        </div>
    </div>
</div>
