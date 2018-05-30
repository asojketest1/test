<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<?php foreach($data as $obj): ?>
    <table class="profileScreen">
        <tr id="outsideBase">
            <td id="outsideIcon" style="background-size: 300px; 
                                background-image: url('../img/appleskin.png');"><?//controllerで画像切り替え
                                                                                　//orangeはsize:350px, bananaはsize:450px ?>
                <?=$this->Html->image('naru.jpg', ['class'=>'outsideIcon']) ?>
            </td>
            <td id="outsideInfo" style="background-size: 300px; 
                                background-image: url('../img/appleframe.png');"><?//controllerで画像切り替え
                                                                                　//sizeは上と同じ ?>
                <div class="outTxt">
                    <div class="outcate">名前：</div>
                    <div class="outcon"><?=$obj->REAL_NAME ?></div>
                </div>
                <div class="outTxt">
                    <div class="outcate">所属：</div>
                    <div class="outcon"><?=$obj->TEAM ?></div>
                </div>
                <div class="outTxt">
                    <div class="outcate">得意科目：</div>
                    <div class="outcon"><?=$obj->SUBJECT ?></div>
                </div>
            </td>
        <tr>
    </table>
    <div class="divoutsel">
        <div class="outsel">
            <div>▶黙々作業する？</div>
            <div>　喋りながら作業する？</div>
        </div>
        <span><?=$this->Html->image('silent.png', ['class'=>'outMark']) ?></span>
        <span>
            <?php //選択しているフルーツによって画像を変える
                switch ($obj->S_or_T) {
                    case 0:
                        echo $this->Html->image("appleleft.png", ["class"=>"seekbar"]);
                        break;
                    case 1:
                        echo $this->Html->image('applecenter.png', ['class'=>'seekbar']);
                        break;
                    case 2:
                        echo $this->Html->image('appleright.png', ['class'=>'seekbar']);
                    break;
                }
            ?>
        </span>
        <span><?=$this->Html->image('talk.png', ['class'=>'outMark']) ?></span>
    </div>
    <div class="divoutsel">
        <div class="outsel">
            <div>▶パソコン派？</div>
            <div>　手書き派？</div>
        </div>
        <span><?=$this->Html->image('pc.png', ['class'=>'outMark']) ?></span>
        <span>
            <?php //選択しているフルーツによって画像を変える
                switch ($obj->P_or_P) {
                    case 0:
                        echo $this->Html->image("appleleft.png", ["class"=>"seekbar"]);
                        break;
                    case 1:
                        echo $this->Html->image('applecenter.png', ['class'=>'seekbar']);
                        break;
                    case 2:
                        echo $this->Html->image('appleright.png', ['class'=>'seekbar']);
                        break;
                }
            ?>
        </span>
        <span><?=$this->Html->image('write.png', ['class'=>'outMark']) ?></span>
    </div>
    <div class="divoutsel">
        <div class="outsel">
            <div>▶新しいものを創造するのが得意？</div>
            <div>　今あるものを改良するのが得意？</div>
        </div>
        <span><?=$this->Html->image('new.png', ['class'=>'outMark']) ?></span>
        <span>
            <?php //選択しているフルーツによって画像を変える
                switch ($obj->I_or_M) {
                    case 0:
                        echo $this->Html->image("appleleft.png", ["class"=>"seekbar"]);
                        break;
                    case 1:
                        echo $this->Html->image('applecenter.png', ['class'=>'seekbar']);
                        break;
                    case 2:
                        echo $this->Html->image('appleright.png', ['class'=>'seekbar']);
                    break;
                }
            ?>
        </span>
        <span><?=$this->Html->image('change.png', ['class'=>'outMark']) ?></span>
    </div>
    <div class="divoutsel">
        <div class="outsel">
            <div>▶アイディア出しが好き？</div>
            <div>　完成させる方が好き？</div>
        </div>
        <span><?=$this->Html->image('idea.png', ['class'=>'outMark']) ?></span>
        <span>
            <?php
                switch ($obj->I_or_C) {
                    case 0:
                        echo $this->Html->image("appleleft.png", ["class"=>"seekbar"]);
                        break;
                    case 1:
                        echo $this->Html->image('applecenter.png', ['class'=>'seekbar']);
                        break;
                    case 2:
                        echo $this->Html->image('appleright.png', ['class'=>'seekbar']);
                        break;
                }
            ?>
        </span>
        <span><?=$this->Html->image('make.png', ['class'=>'outMark']) ?></span>
    </div>
<?php endforeach; ?>
<div id="changeBtn">
    <?=$this->Form->create($entity,['url'=>['action'=>'friends_fruit']]) ?>
        <?=$this->Form->button("皮を剥く", ['type'=>'submit', 'div'=>'false', 'class'=>'changeBtn']) ?>
    <?=$this->Form->end() ?>
</div>
