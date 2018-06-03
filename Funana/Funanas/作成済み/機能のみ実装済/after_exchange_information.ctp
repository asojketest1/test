<h2>相手から情報が飛んできたよ！</h2>
<h4>皮情報</h4>
<?php foreach($skin as $obj): ?>
    <table>
        <tr>
            <td>本名は：</td>
            <td><?=$obj->REAL_NAME ?></td>
        </tr>
        <tr>
            <td>所属会社・学校</td>
            <td><?=$obj->TEAM ?></td>
        </tr>
    </table>
    <?=$obj->REAL_NAME ?>
<?php endforeach; ?>
<h4>実情報</h4>
<?php
    $replace = str_replace(',', '<br>', $check);
    echo $replace;
?>
