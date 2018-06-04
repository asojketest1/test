<div class="registImg" style="position:relative;">
<div class="ardFruitImg-base"><?=$this->Html->image('hAroundFruit.png', ['class'=>'ardFruitImg']) ?></div> 
<div style="position:absolute; top: 50%; left: 50%;
                                -ms-transform: translate(-50%,-50%);
                                -webkit-transform: translate(-50%,-50%);
                                transform: translate(-50%,-50%);
                                margin:0; padding:0;">
    <div id="necTxt">必要事項を入力してください</div>
    <div id="registTxt">
        <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'addRecord']]) ?>
            <div id="nameTxt">名前</div>
            <?=$this->Form->text("NAME", ['style'=>"width:25em; padding:1em;", 'class'=>'nameTxtbox', 'placeholder'=>'ニックネームでも可',  ['size'=>100]]) ?><br />
            <div id="mailTxt">メールアドレス</div>
            <?=$this->Form->text("MAIL", ['style'=>"width:25em; padding:1em;", 'class'=>'mailTxtbox', 'placeholder'=>'メールアドレス',  ['size'=>100]]) ?><br />
            <div id="phoneTxt">電話番号</div>
            <?=$this->Form->text("PHONE", ['style'=>"width:25em; padding:1em;", 'class'=>'phoneTxtbox', 'placeholder'=>'(+81)999-9999',  ['size'=>100]]) ?><br />
            <div id="passTxt">パスワード</div>
            <?=$this->Form->password("PASS", ['style'=>"width:25em; padding:1em;", 'class'=>'passwordTxtbox', 'placeholder'=>'8桁以上の英数字',   ['size'=>100]]) ?>
            <div id="divSignUpBtn">
                <?=$this->Form->button('Sign Up Free', ['type'=>'submit', 'div'=>'false',
                                                                'class'=>'signUpBtn']) ?>
            </div>
        <?=$this->Form->end(); ?>
    </div>
</div>
</div>
