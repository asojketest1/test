<?php foreach($data as $obj):?>
<p><?php echo $obj->id . ":" .$obj->name; ?></p>
<?php endforeach; ?>

<?=$this->Form->create($entity,['url'=>['action'=>'index']])?>
<?=$this->Form->text("name",['placeholder'=>'ユーザー名'])?>
<?=$this->Form->text("pass",['placeholder'=>'パスワード'])?>
<?=$this->Form->button("ログイン")?>
<?=$this->Form->end()?>

<a href="shoplists/regist">ユーザ登録</a>