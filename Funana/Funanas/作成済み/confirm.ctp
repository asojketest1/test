<p id="confTxt">変更を受け付けました</p>
<?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
        <div id="homeBtn">
            <?=$this->Form->button('ホームへ戻る', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'homeBtn']) ?>
        </div>
<?=$this->Form->end(); ?>