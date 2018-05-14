<h1>ユーザ登録</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'registConfirmation'],'class'=>'js-show'])?>
<fieldset>
    <?=$this->Form->input('NAME',['type'=>'text'])?>
    <?=$this->Form->input('MAIL',['type'=>'text'])?>
    <?=$this->Form->input('PASS',['type'=>'password','class'=>'passwd'])?>
    <?=$this->Form->checkbox("hide",["checked"=>true,'class'=>'mask-passwd'])?>
    <?=$this->Form->input('PHONE',['type'=>'number'])?>
</fieldset>
<?=$this->Form->button("送信")?>
<?=$this->Form->end()?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<script>
    $(function() {
        var changeMaskPasswd = function() {
            $('.passwd')[0].type =
                $('.mask-passwd')[0].checked ? 'password' :'text';
        }
        $('.mask-passwd').click(function() {
            changeMaskPasswd();
        });
        changeMaskPasswd();
    });
</script>