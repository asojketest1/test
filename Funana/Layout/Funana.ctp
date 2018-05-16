<!DOCTYPE html>
<html lang = "ja">

<head>
	<?= $this->Html->charset(); ?>
<title>
	<?= $this->fetch('title')?>
</title>
<?php
echo $this->Html->css('funana');
echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js");
echo $this->Html->script('funana');
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');
?>
</head>

<body>
    <div id="container">
        <div id="header">
            <?=$this->element('Funana\header') ?>
        </div>
        <div id="content">
            <?= $this->fetch('content')?>
        </div>
    </div>
</body>

</html>
