<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<div class="mod_form">
    <?=$this->Form->create($entity,['url'=>['action'=>'tradefruit']]) ?>
        <table id="tbselect">
            <?php  foreach($fruit as $obj): //自分の実に登録している情報を一覧表示?>
                <tr>
                    <td class="tdcategory"><?=$obj->ITEM_NAME ?></td>
                    <td class="tdcontent"><?=$obj->CONTENT ?></td>
                    <td class="switch">
                        <label class="switch__label">
                            <?=$this->Form->checkbox("check[]", ['class'=>'switch__input', 'value'=>$obj->ITEM_ID ]) ?>
                            <span class="switch__content"></span>
                            <span class="switch__circle"></span>
                        </label>
                    </td>
                </tr>
            <?php  endforeach;  ?>
        </table>
        <div id="divDecideBtn">
            <?=$this->Form->button('決定', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'decideBtn']) ?>
        </div>
    <?=$this->Form->end() ?>
</div>
