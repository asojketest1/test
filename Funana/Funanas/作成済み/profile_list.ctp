<div class="">
	<?=$this->Form->create($entity,['url'=>['action'=>'profile_list']]) ?>
	<?=$this->Form->text("search", ['size'=>'100', 'placeholder'=>'名前・所属からの検索']) ?>
	<?=$this->Form->button("検索") ?><hr>
	<?=$this->Form->end() ?>
</div>
<?php  foreach($account as $obj): ?>
    <div id = "my_prfile">
        <div id = "my_profile_photo"><?php  //ここにプロフィール写真を表示します ?></div>
        <div id = "my_profile_information">
            <div id = "my_profile_name"><?=$obj->NAME ?></div>
            <div id = "my_profile_mail"><?=$this->Html->image('mail.png',array('alt'=>'logo','width'=>'35','height'=>'35'));?>：<?=$obj->MAIL ?></div>
        </div>
    </div>
    <hr>
        <div id = "friend_cnt"></div>
        <?php //自分を含めない友達人数を表示する ?>
        <p>友達人数</p>
    <hr>
<?php  endforeach;  ?>

