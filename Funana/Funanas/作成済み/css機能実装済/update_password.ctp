<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }
</script>
<div id="uppass">
        <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'confirm']]) ?>
                <div id="oldpass">古いパスワード</div>
                <?=$this->Form->password('now_password',['style'=>"width:25em; padding:1em;", 'class'=>'txtbox',['size'=>100]]) ?>
                <br/>
                <div id="newpass">新しいパスワード</div>
                <?=$this->Form->password('new_password',['style'=>"width:25em; padding:1em;", 'class'=>'txtbox',['size'=>100]]) ?>
                <br/>
                <div id="confpass">新しいパスワード（確認用）</div>
                <?=$this->Form->password('check_password',['style'=>"width:25em; padding:1em;", 'class'=>'txtbox',['size'=>100]]) ?>
                <br/>
                <div id="upBtn">
                        <?=$this->Form->button('変更', ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'updateBtn'])?>
                </div>
        <?=$this->Form->end(); ?>
</div>