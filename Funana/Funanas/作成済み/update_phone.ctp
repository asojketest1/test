<h1>電話番号変更</h1>
<div class="newtell">
    新しい電話番号<?=$this->Form->text('newtell',['type'=>'text']) ?>
</div>

<div class="checktell">
    確認用電話番号<?=$this->Form->text('checktell',['type'=>'text']) ?>
</div>

<div calss="button">
            <?=$this->Form->button("登録")?>
</div>