<header>
    <ul id="acMenu">
        <li id="cmenu" style="background-color:#FF839F;"><?=$this->Html->image('cmenu.png', ['id'=>'cmenuIcon', 'class'=>'cmenuIcon']) ?></li>
        <ul class="close">
            <li id="home">
                <span><?=$this->Html->image('home.png', ['class'=>'icon']) ?></span>
                <span class="menuBtn">ホーム</span>
            </li>
            <li id="acc">
                <span><?=$this->Html->image('account.png', ['class'=>'icon']) ?></span>
                <span class="menuBtn">アカウント情報</span>                                
            </li>
            <li id="edit">
                <span><?=$this->Html->image('edit.png', ['class'=>'icon']) ?></span>
                <span class="menuBtn">プロフィール表示</span>
            </li>
                <ul class="close">
                    <li id="skin" class="menuBtn">
                        皮表示
                    </li>
                    <li id="fruit" class="menuBtn">
                        実表示
                    </li>
                </ul>
            <li id="upgrade">
                <span><?=$this->Html->image('upgrade.png', ['class'=>'icon']) ?></span>
                <span class="menuBtn">有料会員登録</span>
            </li>
            <li id="logout">
                <span><?=$this->Html->image('logout.png', ['class'=>'icon']) ?></span>
                <span class="menuBtn">ログアウト</span>
            </li>
        </ul>
    </ul>
</header>