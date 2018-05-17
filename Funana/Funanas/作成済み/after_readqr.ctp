<h1>プロフィール情報</h1>
<table>
    <?php foreach($skin as $obj): ?>
    <tr>
        <td>名前：</td>
        <td><?=$obj->REAL_NAME ?></td>
    </tr>
    <tr>
        <td>所属会社・学校：</td>
        <td><?=$obj->TEAM ?></td>
    </tr>
    <tr>
        <td>相手から受け取った</td>
        <td>実情報を表示します</td>
    </tr>
    <?php endforeach; ?>
</table>
