<p><?php echo "名前：".$name; ?></p>
<p><?php echo "メアド：".$mail; ?></p>
<p><?php echo "パス：".$pass2; ?></p>
<p><?php echo "電話：".$phone; ?></p>

<p>以上の内容でよろしいですか？</p>
<?=$this->Form->create($entity,['url'=>['action'=>'addRecord']])?>
<?=$this->Form->hidden("NAME",['value'=>$name])?>
<?=$this->Form->hidden("MAIL",['value'=>$mail])?>
<?=$this->Form->hidden("PASS",['value'=>$pass])?>
<?=$this->Form->hidden("QRPASS",['value'=>$qrpass])?>
<?=$this->Form->hidden("PHONE",['value'=>$phone])?>
<?=$this->Form->button("登録")?>
<?=$this->Form->end()?>
