<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<div class="mod_form">
    <?php $i=0; ?>
    <?=$this->Form->create(null,['url'=>['action'=>'tradefruit_animation']]) ?>
        <div id="predata" class="checkbox02">
            <label>
                <?=$this->Form->checkbox("CONTENT", ['name'=>'checkbox01', 'class'=>'checkbox01-input']) ?>
                <span class="checkbox01-parts">前回の送信データと同じ内容にする</span>
            </label>
        </div>
        <table id="tbselect">
            <?php  //foreach($account as $obj): //自分の実に登録している情報を一覧表示?>
                <tr>
                    <td class="tdcategory">趣味</td>
                    <td class="tdcontent">パチンコ、　ゲーム</td>
                    <td class="switch">
                        <label class="switch__label">
                            <?=$this->Form->checkbox("CONTENT"+$i++, ['class'=>'switch__input']) ?>
                            <span class="switch__content"></span>
                            <span class="switch__circle"></span>
                        </label>
                    </td>
                </tr>
            <?php  //endforeach;  ?>
        </table>
        <div id="divDecideBtn">
            <?=$this->Form->button('決定', ['type'=>'submit', 'div'=>'false',
                                                                    'class'=>'decideBtn']) ?>
        </div>
    <?=$this->Form->end() ?>
</div>
