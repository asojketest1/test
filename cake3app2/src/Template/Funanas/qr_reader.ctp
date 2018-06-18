<div id="app">
    <!--<div class="sidebar">
<section class="cameras">
<h2>Cameras</h2>
<ul>
<li v-if="cameras.length === 0" class="empty">No cameras found</li>
<li v-for="camera in cameras">
<span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
<span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
<a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
</span>
</li>
</ul>
</section>
<section class="scans">

</section>
</div>-->
    <div class="preview-container">
        <video id="preview"></video>
    </div>
    <div>
        <section class="cameras">
            <h2>Cameras</h2>
            <ul>
                <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                <li v-for="camera in cameras">
                    <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
                    <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                        <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                    </span>
                </li>
            </ul>
        </section>

        <!--<h2>Scans</h2>
<ul v-if="scans.length === 0">
<li class="empty">No scans yet</li>
</ul>-->
<transition-group name="scans" tag="ul">
<li style="display:none" id="scan_content" v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
</transition-group>
    </div>
    <div>
        <?=$this->Form->create(null, ['name'=>'myform','type'=>'post','url'=>['action'=>'afterReadqr']]) ?>
        <?= $this->Form->hidden('content',['id'=>'content']) ?>
        <?= $this->Form->hidden('paramater',['value'=>$paramater])?>
        <?= $this->Form->end(); ?>
    </div>
    <div>
        <?=$this->Form->create(null, ['type'=>'post','url'=>['action'=>'profileList']]) ?>
        <div id="homeBtn">
            <?=$this->Form->button('ホームへ戻る', ['type'=>'submit', 'div'=>'false',
                                              'class'=>'tfHomeBtn']) ?>
        </div>
        <?=$this->Form->end(); ?>
        <?=$this->Form->create(null, ['name'=>'view','type'=>'post','url'=>['action'=>'tradefruit']]) ?>
        <?= $this->Form->hidden('paramater',['value'=>$paramater]) ?>
        <div id="friendBtn" style="text-align:center;">
            <?=$this->Form->button('QR表示', ['type'=>'submit', 'div'=>'false',
                                              'class'=>'tfHomeBtn']) ?>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</div>
<?=$this->Html->script('app');?>


<script>
    var content = "{{ scan.content }}";
    function content_serch(){
        content = document.getElementById('scan_content').innerHTML;
        if(content != '{{ scan.content }}'){
            var form = document.forms.myform;
            form.content.value = content;
            document.myform.submit();
        }
    }
    setInterval(content_serch, 1000);
</script>
