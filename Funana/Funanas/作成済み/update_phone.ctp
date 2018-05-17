<script>
window.onload=function(){
    var hd=document.getElementById('header'); 
    hd.style.display='block'; 
}
</script>
<div id="upphone">
<?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'confirm']]) ?>
    <div id="nowphoneTxt">現在の電話番号</div>
        <div id="nowphone">+81 9999-9999</div>

    <div id="newphoneTxt">変更する電話番号を入力してください</div>
        <span id="jtell">+81</span>
        <?=$this->Form->text('newtell',['style'=>"width:25em; padding:1em;", 'class'=>'txtbox',['size'=>80]]) ?>

    <p id="phoneMsg">
        新しい電話番号あてにSMSをお送りしますので、<br/>
        そこから認証完了を行ってください。
    </p>
    <div id="upBtn">
                <?=$this->Form->button("変更", ['type'=>'submit', 'div'=>'false',
                                                        'class'=>'updateBtn'])?>
    </div>
<?=$this->Form->end(); ?>
</div>