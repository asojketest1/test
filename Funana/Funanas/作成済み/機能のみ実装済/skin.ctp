<h1>皮情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'fruit']]) ?>
<div class="changeBtn"><?=$this->Form->button("実情報に切り替える") ?></div>
<?=$this->Form->end() ?>
<table class="profileScreen">
    <?php foreach($data as $obj): ?>
        <?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
        <tr class="text_form">
            <td id="">本名：</td>
            <td><?=$obj->REAL_NAME ?></td>
            <td><?=$this->Form->text("REAL_NAME") ?></td>
        </tr>
        <tr class="text_form">
            <td>所属会社・学校：</td>
            <td><?=$obj->TEAM ?></td>
            <td><?=$this->Form->text("TEAM") ?></td>
        </tr>
        <tr class="text_form">
            <?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
            <td>得意科目：</td>
            <td><?=$obj->SUBJECT ?></td>
            <td><?=$this->Form->text("SUBJECT") ?></td>
        </tr>
        <tr>
            <td>作業時の雰囲気は？？</td>
            <td><?=$this->Form->radio("S_or_T",
                [
                    ['text'=>'黙々やります！','value'=>0],
                    ['text'=>'まぁまぁ黙々やります！','value'=>1],
                    ['text'=>'普通にやります！','value'=>2],
                    ['text'=>'まぁまぁ話しながらやります！','value'=>3],
                    ['text'=>'話しながらやりたい！','value'=>4]
                ],
                ['label'=>true,'value'=>$obj->S_or_T])?>
            </td>
        </tr>
        <tr>
            <td>パソコン派？？手書き派？？</td>
            <td><?=$this->Form->radio("P_or_P",
                [
                    ['text'=>'パソコン派！','value'=>0],
                    ['text'=>'どちらでも！','value'=>1],
                    ['text'=>'手書き派！','value'=>2]
                ],
                ['label'=>true,'value'=>$obj->P_or_P])?>
            </td>
        </tr>
        <tr>
            <td>改良派？？創造派？？</td>
            <td><?=$this->Form->radio("I_or_M",
                [
                    ['text'=>'改良派！','value'=>0],
                    ['text'=>'どちらでも！','value'=>1],
                    ['text'=>'創造派！','value'=>2]
                ],
                ['label'=>true,'value'=>$obj->I_or_M])?>
            </td>
        </tr>
        <tr>
            <td>仕事好き？？遊び好き？？</td>
            <td><?=$this->Form->radio("W_or_O",
                [
                    ['text'=>'仕事好き！','value'=>0],
                    ['text'=>'どちらでも！','value'=>1],
                    ['text'=>'遊び好き！','value'=>2]
                ],
                ['label'=>true,'value'=>$obj->W_or_O])?>
            </td>
        </tr>
        <tr>
            <td>考察タイプ？？実行タイプ？？</td>
            <td><?=$this->Form->radio("I_or_C",
                [
                    ['text'=>'考察タイプ！','value'=>0],
                    ['text'=>'どちらでも！','value'=>1],
                    ['text'=>'実行タイプ！','value'=>2]
                ],
                ['label'=>true,'value'=>$obj->I_or_C])?>
            </td>
        </tr>
        <tr class="saveBtn">
            <td><?=$this->Form->button("保存") ?></td>
            <?=$this->Form->end() ?>
        </tr>
        
    <img src="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=http://localhost/cakephp/funana/after-readqr?id=<?= $id ?>" alt="QRコード">
    <?php endforeach; ?>
</table>
