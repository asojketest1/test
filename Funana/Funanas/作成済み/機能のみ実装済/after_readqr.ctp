<h1>プロフィール情報</h1>
<table>
    <?php // QRを受け取った人の皮情報を表示する ?>
    <?php foreach($skin as $obj): ?>
        <tr>
            <td>名前：</td>
            <td><?=$obj->REAL_NAME ?></td>
        </tr>
        <tr>
            <td>所属会社・学校：</td>
            <td><?=$obj->TEAM ?></td>
        </tr>
    <?php endforeach; ?>
    <?php // QRを受け取った人の実情報を表示する ?>
    <?php foreach($fruit as $obj): ?>
        <tr>
            <td><?=$obj->ITEM_NAME ?></td>
            <td><?=$obj->CONTENT ?></td>
        </tr>
    <?php endforeach; ?>
</table>
