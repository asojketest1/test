<h1>パスワード変更画面</h1>

<div class="old_password">
        古いパスワード<?=$this->Form->password('password',['type'=>'text']) ?>
</div>

<div class="new_password">
        新しいパスワード<?=$this->Form->password('password',['type'=>'text']) ?>
</div>

<div class="password">
        確認用パスワードパスワード<?=$this->Form->password('password',['type'=>'text']) ?>
</div>

<div calss="button">
        <?=$this->Form->button("変更")?>
</div>