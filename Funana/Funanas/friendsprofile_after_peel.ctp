</h1>友達一覧タップ後の皮情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'fruit']]) ?>
<div class="changeBtn"><?=$this->Form->button("実情報に切り替える") ?></div>
<?=$this->Form->end() ?>
<table class="profileScreen">
    <?php foreach($data as $obj): ?>
        <?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
        <tr class="text_form">
            <td id="">本名：</td>
            <td><?=$obj->REAL_NAME ?></td>
        </tr>
        <tr class="text_form">
            <td>所属会社・学校：</td>
            <td><?=$obj->TEAM ?></td>
        </tr>
        <tr class="text_form">
            <?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
            <td>得意科目：</td>
            <td><?=$obj->SUBJECT ?></td>
        </tr>
        <tr>
            <td>作業時の雰囲気は？？</td>
            <td>
                <?php
                    switch ($obj->S_or_T) {
                        case 0:
                            echo "黙々やります！";
                            break;
                        case 1:
                            echo "まぁまぁ黙々やります！";
                            break;
                        case 2:
                            echo "普通にやります！";
                            break;
                        case 3:
                            echo "まぁまぁ話しながらやります！";
                        break;
                        case 4:
                            echo "話しながらやりたい！";
                        break;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>パソコン派？？手書き派？？</td>
            <td>
                <?php
                    switch ($obj->P_or_P) {
                        case 0:
                            echo "パソコン派！";
                        break;
                        case 1:
                            echo "どちらでも！";
                        break;
                        case 2:
                            echo "手書き派！";
                        break;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>改良派？？創造派？？</td>
            <td>
                <?php
                    switch ($obj->I_or_M) {
                        case 0:
                            echo "改良派！";
                        break;
                        case 1:
                            echo "どちらでも！";
                        break;
                        case 2:
                            echo "創造派！";
                        break;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>仕事好き？？遊び好き？？</td>
            <td>
                <?php
                    switch ($obj->W_or_O) {
                        case 0:
                            echo "仕事好き！";
                        break;
                        case 1:
                            echo "どちらでも！";
                        break;
                        case 2:
                            echo "遊び好き！";
                        break;
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>考察タイプ？？実行タイプ？？</td>
            <td>
                <?php
                    switch ($obj->I_or_C) {
                        case 0:
                            echo "考察タイプ！";
                        break;
                        case 1:
                            echo "どちらでも！";
                        break;
                        case 2:
                            echo "実行タイプ！";
                        break;
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
