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
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js');
    echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js');
    echo $this->Html->script('https://rawgit.com/schmich/instascan-builds/master/instascan.min.js');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
?>
</head>

<body>
    <div id="container">
        <div id="header" style="display:none;">
            <?=$this->element('Funana/header') ?>
        </div>
        <div id="content">
            <?= $this->fetch('content')?>
        </div>
    </div>
</body>

</html>
