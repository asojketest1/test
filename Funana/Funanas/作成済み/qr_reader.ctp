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
        <h2>Scans</h2>
        <ul v-if="scans.length === 0">
            <li class="empty">No scans yet</li>
        </ul>
        <transition-group name="scans" tag="ul">
            <li id="scan_content" v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
        </transition-group>
    </div>
    <div>
        <?=$this->Form->create(null, ['name'=>'myform','type'=>'post','url'=>['action'=>'read_after']]) ?>
        <?= $this->Form->hidden('content',['id'=>'content']) ?>
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
