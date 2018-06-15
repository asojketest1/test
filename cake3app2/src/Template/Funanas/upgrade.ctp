<h1>有料会員</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'']])?>

    <div class="username">
                ユーザー名<?=$this->Form->text('username',['type'=>'text']) ?>
    </div>

    <div class="password">
            パスワード<?=$this->Form->text('password',['type'=>'text']) ?>
    </div>

    <div class="paypalID">
            PayPalID<?=$this->Form->text('paypalid',['type'=>'text']) ?>
    </div>

    <div class="paypalpass">
            PayPalパスワード<?=$this->Form->text('paypalpass',['type'=>'text']) ?>
    </div>

    <div calss="button">
            <?=$this->Form->button("登録")?>
    </div>
<?=$this->Form->end()?>

