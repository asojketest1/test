<div id="divLoginBtn">
    <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'login']]) ?>
        <?=$this->Form->button('ログイン', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'loginBtn']) ?>
    <?=$this->Form->end(); ?>
</div>
<div class="indexImg" style="position:relative;">
    <div class="fruitImg-base"><?=$this->Html->image('fruit.png', ['class'=>'fruitImg']) ?></div> 
    <div style="position:absolute; top:0px; left:3px;">
        <div id="indexMsg">
            <h1 id="indexTtl">  
                フルーツ</br>
                ×</br>
                コミュニケーション</br>
            </h1>
            <p id="indexStc">
                初めましての人とも、</br>
                久しぶりな人とも、</br>
                急なプロジェクトチーム発足でも、</br>
                スピード感を持ってフレッシュに</br>
                仲良くなれるコミュニケーションツール</br>
            </p>
        </div>
    </div>
</div>
<div id="divRegisterBtn">
    <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'register']]) ?>
        <?=$this->Form->button('アカウントを作成　　 ＞', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'registerBtn']) ?>
    <?=$this->Form->end(); ?>
</div>
<div id="loginLink">
    <?=$this->Html->link("ログインはこちらから",['controller'=>'Funana',
                        'action'=>'login'])?>
</div   >
