<?php

// ログイン状態チェック
if (!isset($display)) {
    //header("Location: Logout.php");
    //exit;
}
?>

<p>リスト表示 名前：<?php echo $display ?></p>
<?=$this->Form->create($entity,['url'=>['action'=>'list']])?>
<p>店舗：
<select name="shopid">
   <option value="0">店舗を選んでください</option>
    <?php foreach($data as $obj):?>
    <?php echo "<option value='" .$obj->shop_id ."'>" .$obj->shop->name ."</option>"; ?>
    <?php endforeach; ?>
</select>
</p>
<?=$this->Form->button("表示")?>
<?=$this->Form->end()?>

<?=$this->Form->create($entity,['url'=>['action'=>'wantProduct']])?>
    <button>買う物登録</button>
    <button formaction="shopRegist">店舗マスタメンテナンス</button>
<?=$this->Form->end()?>