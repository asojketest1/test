<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }
</script>
<div id="auth">
    <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'confirm']]) ?>

        <div id="codeInputTxt">SMSに送られたコードを入力してください</div>
            <?=$this->Form->text('code',['style'=>"width:25em; padding:1em;", 'class'=>'txtbox',['size'=>80]]) ?>
        <div id="authBtn">
            <?=$this->Form->button("認証", ['type'=>'submit', 'div'=>'false',
                                                            'class'=>'updateBtn'])?>
        </div>
    <?=$this->Form->end(); ?>
</div>