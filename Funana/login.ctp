<h1>ログイン</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'login']])?>
<fieldset>
    <?=$this->Form->input('name',['type'=>'text'])?>
    <?=$this->Form->input('pass',['type'=>'text'])?>
</fieldset>
<?=$this->Form->button("送信")?>
<?=$this->Form->end()?>