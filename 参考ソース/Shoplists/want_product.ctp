<p>買う物登録</p>
<?=$this->Form->create($entity,['url'=>['action'=>'wantProduct']])?>
<?=$this->Form->hidden("id")?>
<p>商品名：<?=$this->Form->text("productname")?></p>
<p>店舗：
    <select name="shopid">
        <option value="0">店舗を選んでください</option>
        <?php foreach($data as $obj):?>
        <?php echo "<option value='" .$obj->shop_id ."'>" .$obj->shop->name ."</option>"; ?>
        <?php endforeach; ?>
    </select>
</p>
<?php echo $this->Form->input('誕生日', array(
'type' => 'date',
'dateFormat' => 'YMD',
'monthNames' => false,
'empty' => array('year' => '年', 'month' => '月', 'day' => '日'),));?>
<?=$this->Form->button("登録")?>
<?=$this->Form->end()?>