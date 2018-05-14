<h1>実情報表示</h1>
<?=$this->Form->create($entity,['url'=>['action'=>'skin']]) ?>
<?=$this->Form->button("実情報に切り替える") ?>
<table>
    <?php foreach($data as $obj): ?>
        <tr>
            <td></td>
        </tr>
    <?php endforeach; ?>
</table>
<?=$this->Form->end() ?>
