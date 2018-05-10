
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
</head>

<body>
    <div id="container">
        <div id="header">
            <h1>買い物リスト</h1>
        </div>
        <div id="content">
            <?= $this->fetch('content')?>
        </div>
        <div id="footer">
            footer
        </div>
    </div>
</body>