<script>
    window.onload=function(){
        var hd=document.getElementById('header'); 
        hd.style.display='block'; 
    }      
</script>
<div id="inside">
    <div id="insideImgTp">
        <span id="inL"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
    </div>
    <table id="insideTable">
        <tr>
            <td class="inscategory">Artist</td>
            <td class="inscontent">EXILE</td>
        </tr>
        <tr>
            <td class="inscategory">Music</td>
            <td class="inscontent">R.Y.U.S.E.I.</td>
        </tr>
        <tr>
            <td class="inscategory">Food</td>
            <td class="inscontent">しらたき</td>
        </tr>
        <tr>
            <td class="inscategory">Drink</td>
            <td class="inscontent">緑茶</td>
        </tr>
        <tr>
            <td class="inscategory">Hobby</td>
            <td class="inscontent">パチンコ、ゲーム</td>
        </tr>
        <tr>
            <td class="inscategory">Hotrday</td>
            <td class="inscontent">ドライブ</td>
        </tr>
        <tr>
            <td class="inscategory">Sport</td>
            <td class="inscontent">バスケ</td>
        </tr>
    </table>
    <div id="insideImgBtm">
        <span id="inL"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
        <span id="inCL"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inCR"><?=$this->Html->image('applefruit.png', ['class'=>'inC']) ?></span>
        <span id="inR"><?=$this->Html->image('applefruit.png', ['class'=>'inLR']) ?></span>
    </div>
</div>